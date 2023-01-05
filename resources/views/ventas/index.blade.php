@extends('plantilla')
@section('contenido')
<div class="container">
    <div><a href="{{ url('ventas/formVenta') }}" class="btn btn-primary">Nuevo</a></div>
    <br>
    
    <div class="card">
        <div class="card-header text-center">Lista de Ventas</div>
        <div class="card-body">
            <div class="row">
                <table class="table" id="tabla">
                    <thead>
                        <tr>
                            <th>Producto vendido</th>
                            <th>Cantidad Vendida</th>
                            <th>Cantidad Disponible</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ventas as $venta)
                        <tr>
                            <td>{{ $venta->nombre_producto }}</td>
                            <td>{{ $venta->cantidad }}</td>
                            <td>{{ $venta->stock }}</td>
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
    });

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
        text: "El empleado ha sido eliminado con éxito",
        type: "success"
        });
        location.reload();
        },
        401: function (data) {
        swal.fire({
        title: "Error",
        text: "Complete los campos obligatorios",
        type: "error"
        });
        },
        500: function () {
        swal('¡Ups!', 'Error interno del servidor', 'error')
        }
        }
        });
        });

</script>
@endsection




