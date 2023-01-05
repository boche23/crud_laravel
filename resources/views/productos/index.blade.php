@extends('plantilla')
@section('contenido')
<div class="container">
    <div><a href="{{ url('productos/formProducto') }}" class="btn btn-primary">Nuevo</a></div>
    <br>
    <div class="card">
        <div class="card-header text-center">Lista de Productos</div>
        <div class="card-body">
            <div class="row">
                <table class="table" id="tabla">
                    <thead>
                        <tr>
                            <th>Id de Producto</th>
                            <th>Nombre de Producto</th>
                            <th>Referencia</th>
                            <th>Precio</th>
                            <th>Peso</th>
                            <th>Categoria</th>
                            <th>Stock</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productos as $producto)
                        <tr>
                            <td scope="row">{{ $producto->id }}</td>
                            <td>{{ $producto->nombre_producto }}</td>
                            <td>{{ $producto->referencia }}</td>
                            <td>{{ $producto->precio }}</td>
                            <td>{{ $producto->peso }}</td>
                            <td>{{ $producto->categoria }}</td>
                            <td>{{ $producto->stock }}</td>
                            <td><a href="{{ url('productos/editProducto', ['id' => $producto->id]) }}"><i
                                        class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a></td>
                                        <td>
                                            <form action="{{ route('productos.eliminar', $producto) }}" method="POST">
                                              @method('DELETE')
                                              @csrf
                                              <input type="submit" value="Eliminar" class="btn btn-danger" 
                                              onclick="return confirm('¿Desea Eliminar el registro...?')">
                                            </form>
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
@section('pie')
<script>
    $(document).ready( function () {
    $('#tabla').DataTable();

    $('#idProducto').on('click', function(e){

        var id = $('#id').val();
        $.ajax({
        async:true,
        type: 'POST',
        url: '/productos/deleteProducto',
        dataType: 'json',
        data: {_token: "{{ csrf_token() }}",id:id},
        statusCode: {
        200: function(data) {
        swal.fire({
        title: "Bien hecho",
        text: "El Producto ha sido eliminado con éxito",
        type: "success"
        });
        location.reload();
        },
        401: function (data) {
        swal.fire({
        title: "Error",
        text: "No se ah podido eliminar",
        type: "error"
        });
        },
        500: function () {
        swal('¡Ups!', 'Error interno del servidor', 'error')
        }
        }
        });
        });
    } );


</script>
@endsection

