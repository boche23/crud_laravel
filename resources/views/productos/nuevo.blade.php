@extends('plantilla')
@section('contenido')
<div class="container">
  @if($errors->any())
  <div class="alert alert-danger" role="alert">
    @foreach ($errors->all() as $error)
        -{{ $error }}
    @endforeach
  </div>
  @endif
  <form action="{{ route('productos.guardar') }}" method="POST">
    @if (session('mensaje'))
    <div class="alert alert-{{session('tipo')}}">
      {{session('mensaje')}}
    </div>
    @endif
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label for="my-input">Nombre del producto</label>
          <input id="my-input" class="form-control" type="text" value="{{ old('nombre_producto') }}" name="nombre_producto">
        </div>
      </div>
      <div class="col-md-3">
          <div class="form-group">
            <label for="my-input">Referencia</label>
            <input id="my-input" class="form-control" type="text" value="{{ old('referencia') }}" name="referencia">
          </div>
      </div>
      <div class="col-md-3">
          <div class="form-group">
            <label for="my-input">Precio del producto</label>
            <input id="my-input" class="form-control" type="number" value="{{ old('precio') }}" name="precio">
          </div>
      </div>
      <div class="col-md-3">
          <div class="form-group">
            <label for="my-input">Peso del producto</label>
            <input id="my-input" class="form-control" type="number" value="{{ old('peso') }}" name="peso">
          </div>
      </div>
      <div class="col-md-3">
          <div class="form-group">
            <label for="my-input">Categoria</label>
            <input id="my-input" class="form-control" type="text" value="{{ old('categoria') }}" name="categoria">
          </div>
      </div>
      <div class="col-md-3">
          <div class="form-group">
            <label for="my-input">Stock</label>
            <input id="my-input" class="form-control" type="number" value="{{ old('stock') }}" name="stock">
          </div>
      </div>
      <div class="col-auto">
        @csrf
        <br><button type="submit" class="btn btn-success">Guardar</button>
      </div>
      <div class="col-auto">
          <br><a href="{{ url('/') }}" class="btn btn-danger">Regresar</a>
        </div>
     
    </div>
  </form>
</div>
@endsection
@section('pie')

@endsection