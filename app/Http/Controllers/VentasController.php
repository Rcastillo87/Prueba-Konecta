<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ventas;
use App\Models\Productos;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class VentasController extends Controller
{
    public function Home_Ventas()
    {
        $Productos = Productos::All();

        $ventas =  Ventas::join('productos', 'productos.id', 'ventas.id_producto')
        ->orderBy('created_at', 'desc')
        ->get(['ventas.*', 'productos.nombre_producto']);

        return view('Home_Ventas')
            ->with('productos',  $Productos )
            ->with('ventas',  $ventas );
    }

    public function Crear_Ventas( Request $request )
    {
        $validator = Validator::make($request->all(), [
            "id_producto" => 'required|integer',
            "cantidad" => 'required|integer',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 200);
        }

        $Productos = Productos::find( $request->id_producto );

        if( is_null($Productos) ){
            return response()->json(['errors' => "El Producto no existe",], 200);
        }

        $resta =  $Productos->stock - $request->cantidad ;
        if( ( $resta ) < 0 ){
            return response()->json(['errors' => "No hay esa cantidad en el inventario"],200);
        }

        DB::beginTransaction();
        try {
            $upd = Productos::findorfail($request->id_producto);
            $upd->stock = $resta;
            $upd->update( $request->all() );      

            $Ventas = new Ventas;
            $vts = $Ventas->create( $request->all() ); 

            $ventas =  Ventas::join('productos', 'productos.id', 'ventas.id_producto')
            ->where('ventas.id', $vts->id)
            ->get(['ventas.*', 'productos.nombre_producto']);    
            DB::commit();
            return $ventas[0];                   
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
    }

}
