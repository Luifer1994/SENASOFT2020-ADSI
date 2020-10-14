@extends('layouts.plantilla')
@section('titulo')
    VENTAS
@endsection
@section('contenido')
 {{-- MENSAJE QUE RETORNA EL CONTROLADOR AL ELIMINAR UN FUNCIONARIO --}}
 @if (session('mensaje'))
 <script>
    swal("EXITO!", "{{ session('mensaje') }}", {
                    icon : "success",
                    buttons: {        			
                        confirm: {
                            className : 'btn btn-success'
                        }
                    },
                });
 </script>
@endif

{{-- ERROR DE VALIDACION DE CAMPOS Y MUESTRA UNA ALERTA DE QUE HAY CAMPOS VAVIOS --}}
@if ($errors->any())
<script>
    swal("ERRRO AL REGISTRAR!", "HAY CAMPOS VACIOS REVISA EL FORMULARIO!", {
            icon : "error",
            buttons: {        			
            confirm: {
            className : 'btn btn-danger'
            }
            },
        });
</script>
  @endif
  
      <div class="row">
          <div class="col-sm-6 col-md-6">
              <div class="card card-stats card-round">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="card-title">PRODUCTOS</h4>
                        </div>
                    </div> 
                </div>
                  <div class="card-body">
                      <div class="row align-items-center">
                          <h1>1</h1>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-sm-6 col-md-6">
              <div class="card card-stats card-round">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="card-title">FACTURA</h4>
                        </div>
                    </div> 
                </div>
                  <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">PRODUCTO</th>
                            <th scope="col">CANTIDAD</th>
                            <th scope="col">PRECIOx1</th>
                            <th scope="col">VALOR</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                          </tr>
                          <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                          </tr>
                        </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
   
@endsection