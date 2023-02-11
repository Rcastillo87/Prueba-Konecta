@extends('layouts.app')

@section('content')
<div class="container">
<h3>Crear Ventas</h3>

<div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card ">
                <div class="card-header">{{ __('Crear Ventas') }}</div>

                <div class="card-body row justify-content-center ">
                    <form class="row justify-content-center" name="my_form" id="my_form"  method="POST" action="{{ route('Crear_Ventas') }}">
                        @csrf

                        <div class="mb-3 col-md-5">
                            <label class="form-label">Prooductos</label>
                            <select class="form-select" aria-label="Default select example" name="id_producto" id="id_producto">
                                @foreach ($productos as $pro)
                                    <option value="{{ $pro->id }}">{{ $pro->nombre_producto }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3 col-md-5">
                            <label class="form-label">Cantidad</label>
                            <input type="text" name="cantidad" placeholder="Digite la cantidad" class="form-control" id="cantidad">
                        </div>

                        <div class="mb-3 col-md-7">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<br>
<br>
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card">

<table class="table table-striped table-hover table-responsive"  name="table" id="table">
  <thead>
    <tr>
      <th scope="col">ID Venta</th>
      <th scope="col">ID Producto</th>
      <th scope="col">Nombre Producto</th>
      <th scope="col">Cantidad Comprada</th>
      <th scope="col">Fecha creacion</th>
      <th scope="col">fecha actualizacion</th>
    </tr>
  </thead>

  <tbody name="tbody" id="tbody">
    @foreach ($ventas as $ven)
      <tr>
          <td >{{ $ven->id}}</td>
          <td>{{ $ven->id_producto }}</td>
          <td>{{ $ven->nombre_producto }}</td>
          <td>{{ $ven->cantidad }}</td>
          <td>{{ $ven->created_at }}</td>
          <td>{{ $ven->updated_at }}</td>
        </tr>
    @endforeach
  </tbody>
</table>
</div>
</div>
</div>
</div>
@endsection
