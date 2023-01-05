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
  <form action="{{ route('productos.editGuardar') }}" method="POST">
      <input id="my-input" class="form-control" type="hidden" value="{{ $data->id }}" name="id">
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label for="my-input">Nombre del producto</label>
          <input id="my-input" class="form-control" type="text" value="{{ $data->nombre_producto }}" name="nombre_producto">
        </div>
      </div>
      <div class="col-md-3">
          <div class="form-group">
            <label for="my-input">Referencia</label>
            <input id="my-input" class="form-control" type="text" value="{{  $data->referencia }}" name="referencia">
          </div>
      </div>
      <div class="col-md-3">
          <div class="form-group">
            <label for="my-input">Precio del producto</label>
            <input id="my-input" class="form-control" type="number" value="{{ $data->precio }}" name="precio">
          </div>
      </div>
      <div class="col-md-3">
          <div class="form-group">
            <label for="my-input">Peso del producto</label>
            <input id="my-input" class="form-control" type="number" value="{{ $data->peso }}" name="peso">
          </div>
      </div>
      <div class="col-md-3">
          <div class="form-group">
            <label for="my-input">Categoria</label>
            <input id="my-input" class="form-control" type="text" value="{{ $data->categoria }}" name="categoria">
          </div>
      </div>
      <div class="col-md-3">
          <div class="form-group">
            <label for="my-input">Stock</label>
            <input id="my-input" class="form-control" type="number" value="{{ $data->stock}}" name="stock">
          </div>
      </div>
      <div class="col-auto">
        @csrf
        <br><button type="submit" class="btn btn-success">Guardar</button>
      </div>
    </div>
  </form>
</div>
@endsection
@section('pie')
@endsection
