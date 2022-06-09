<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://use.fontawesome.com/af27afbee8.js"></script>
    <title>Prueba Tecnica</title>
  </head>
  <body>
    <header>
        <div class="px-3 py-2 bg-dark text-white">
          <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
              <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
              </a>
    
              <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                <li>
                    <a href="{{ url('/productos') }}" class="nav-link text-secondary">
                        <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                            <use xlink:href="#home" />
                        </svg>
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ url('/ventas') }}" class="nav-link text-white">
                        <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                            <use xlink:href="#speedometer2" />
                        </svg>
                        Ventas
                    </a>
                </li>

            </ul>
            </div>
          </div>
        </div>
        <div class="px-3 py-2 border-bottom mb-3">
          <div class="container d-flex flex-wrap justify-content-center">
            <form class="col-12 col-lg-auto mb-2 mb-lg-0 me-lg-auto">
              <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
            </form>
    
            <div class="text-end">
              <button type="button" class="btn btn-light text-dark me-2">Login</button>
              <button type="button" class="btn btn-primary">Sign-up</button>
            </div>
          </div>
        </div>
      </header>
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
                <input id="my-input" class="form-control" type="text" value="{{ old('cantidad') }}" name="cantidad">
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

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
  <script>
    $(document).ready( function () {
        $('#tabla').DataTable();
        } );
  </script>
</html>