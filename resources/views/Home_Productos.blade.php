@extends('layouts.app')

@section('content')
<div class="container">
<h3>Crear Productos</h3>

<div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card ">
                <div class="card-header">{{ __('Crear Productos') }}</div>

                <div class="card-body ">
                    <form class="row justify-content-center"  name="form" id="form" method="POST" action="{{ route('Crear_Productos') }}">
                        @csrf

                        <input id="id" type="hidden" name="id">

                        <div class="mb-3 col-md-5">
                            <label  class="form-label">Nombre Del Producto</label>
                            <input value="{{ old('nombre_producto') }}" type="text" name="nombre_producto" placeholder="Digite el nombre del Producto" class="form-control" id="nombre_producto">
                            @error('nombre_producto')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-5">
                            <label class="form-label">Referencia</label>
                            <input value="{{ old('referencia') }}" type="text" name="referencia" placeholder="Digite la Referencia" class="form-control" id="referencia">
                            @error('referencia')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-5">
                            <label  class="form-label">Categoria</label>
                            <input value="{{ old('referencia') }}"  type="text" name="categoria" placeholder="Digite la categoria del Producto" class="form-control" id="categoria">
                            @error('categoria')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-5">
                            <label class="form-label">Stock</label>
                            <input value="{{ old('stock') }}" type="text" name="stock" placeholder="Digite la cantidad en stock" class="form-control" id="stock">
                            @error('stock')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-5">
                            <label  class="form-label">Precio</label>
                            <input value="{{ old('precio') }}" type="text" name="precio" placeholder="Digite el precio del Producto" class="form-control" id="precio">
                            @error('precio')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-5">
                            <label class="form-label">Peso</label>
                            <input value="{{ old('peso') }}" type="text" name="peso" placeholder="Digite el peso del Producto" class="form-control" id="peso">
                            @error('peso')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-7">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Enviar') }}
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

<table class="table table-striped table-hover table-responsive">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nombre Producto</th>
      <th scope="col">Referencia</th>
      <th scope="col">Categoria</th>
      <th scope="col">Precio</th>
      <th scope="col">Peso en Gramos</th>
      <th scope="col">Cantidad En Stock</th>
      <th scope="col">Fecha creacion</th>
      <th scope="col">fecha actualizacion</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($productos as $prod)
      <tr>
          <th scope="row">{{ $prod->id}}</th>
          <td>{{ $prod->nombre_producto }}</td>
          <td>{{ $prod->referencia }}</td>
          <td>{{ $prod->categoria }}</td>
          <td>{{ $prod->precio }}</td>
          <td>{{ $prod->peso }}</td>
          <td>{{ $prod->stock }}</td>
          <td>{{ $prod->created_at }}</td>
          <td>{{ $prod->updated_at }}</td>
        <td>         
            <a class="btn btn-danger btn-sm" href="{{ url('/Eliminar_Productos/?id='.@$prod->id) }}" 
            role="button">Borrar</a>
            <a class="btn btn-warning btn-sm" onclick="update('{{@$prod->id}}');" role="button">Editar</a>
        </td>
        </tr>
    @endforeach
  </tbody>
</table>
</div>
</div>
</div>
</div>
@endsection
