<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductosController extends Controller
{

    public function Home_Productos()
    {
        $productos =  Productos::All();
        return view('Home_Productos')->with('productos',  $productos );
    }

    public function Lista_Productos(Request $request)
    {
        $request->validate([
            "id" => 'required|integer',
        ]);
        return Productos::find( $request->id ); 
    }

    public function Crear_Productos(Request $request)
    {
        $request->validate([
            "id" => 'nullable|integer',
            "nombre_producto" => 'required',
            "referencia" => 'required',
            "precio" => 'required|integer',
            "peso" => 'required|integer',
            "categoria"  => 'required',
            "stock" => 'required|integer'
        ]);

        if( is_null(  $request->id ) ){

            $existe = Productos::where("nombre_producto", $request->nombre_producto)->get()->first();
            if( ! is_null($existe) ){
                return response()->json(['errors' => "No se puede duplicar un producto",], 200);
            }
            $existe = Productos::where("referencia", $request->referencia)->get()->first();
            if( ! is_null($existe) ){
                return response()->json(['errors' => "No se puede duplicar la referencia de un producto",], 200);
            }

            DB::beginTransaction();
            try {
                $Productos = new Productos;
                $Productos->create( $request->all() );            
                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();
                return $e->getMessage();
            }
        }else{

            $existe = Productos::find( $request->id );
            if( is_null($existe) ){
                return response()->json(['errors' => "El Producto no existe",], 200);
            }
            $existe = Productos::where("nombre_producto", $request->nombre_producto)->get()->first();
            if( ! is_null($existe) ){
                if( $existe->id !=  $request->id ){
                    return response()->json(['errors' => "No se puede duplicar el nombre del producto",], 200);
                }
            }
            $existe = Productos::where("referencia", $request->referencia)->get()->first();
            if( ! is_null($existe) ){
                if( $existe->id !=  $request->id ){
                    return response()->json(['errors' => "No se puede duplicar la referencia del producto",], 200);
                }
            }
    
            DB::beginTransaction();
            try {
                $upd = Productos::findorfail($request->id);
                $upd->update( $request->all() );       
                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();
                return $e->getMessage();
            }
        }

        return redirect()->route('Home_Productos');
        
    } 

    public function Eliminar_Productos(Request $request)
    {
        $request->validate([
            "id" => 'required|integer'
        ]);

        $existe = Productos::find( $request->id );
        if( is_null($existe) ){
            return response()->json(['errors' => "El Producto no existe",], 200);
        }

        DB::beginTransaction();
        try {
            $existe->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }

        return redirect()->route('Home_Productos');
    } 

}
