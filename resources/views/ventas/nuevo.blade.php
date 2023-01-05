@extends('plantilla')
@section('contenido')
<div class="container">
  <div class="card">
    <div class="card-header text-center">Registrar nueva venta</div>
    <div class="card-body">
      @if($errors->any())
      <div class="alert alert-danger" role="alert">
        @foreach ($errors->all() as $error)
        -{{ $error }}
        @endforeach
      </div>
      @endif
      @if (session('mensaje'))
      <div class="alert alert-{{session('tipo')}}">
        {{session('mensaje')}}
      </div>
      @endif

      <form action="{{ route('ventas.guardar') }}" method="POST">
        <div class="row">
          <div class="col-md-3">
            <div class="form-group">
              <label for="my-select">Seleccione Producto</label>
              <select id="my-select" class="form-control" value="{{ old('id_producto') }}" name="id_producto">
                <option value="">Seleccione</option>
                @foreach ($ventas as $item)
                <option value="{{ $item->id }}">{{ $item->nombre_producto }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="my-input">Cantidad Vendida</label>
              <input id="my-input" class="form-control" type="number" value="{{ old('cantidad') }}" name="cantidad">
            </div>
          </div>
          <div class="col-auto">
            @csrf
            <br><button type="submit" class="btn btn-success">Guardar</button>
          </div>
          <div class="col-auto">
            <br><a href="{{ url('/ventas') }}" class="btn btn-danger">Cancelar</a>
          </div>

        </div>
      </form>
    </div>
  </div>

</div>
@endsection
@section('pie')

@endsection
