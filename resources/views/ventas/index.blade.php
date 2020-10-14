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
                <div class="card-body table-responsive">
                  <table class="table table-striped" id="table">
                      <thead>
                        <tr>
                          <th scope="col">NOMBRE</th>
                          <th scope="col">PRECIO</th>
                          <th scope="col">ACCION</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($productos as $producto)
                            <tr>{{ $producto->nombreP }}</tr>
                            <tr>{{ $producto->precio }}</tr>
                            <tr>boton</tr>
                          @endforeach
                      </tbody>
                    </table>
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
                            @foreach ($facturaTemporal as $item)
                                <td>{{ $item->nombreP }}</td>
                                <td>{{ $item->cantidad }}</td>
                                <td>$ {{ number_format($item->precio)}}</td>
                                <td>$ {{ number_format($item->cantidad*$item->precio)}}</td>
                            @endforeach
                          <tr>
                          </tr>
                        </tbody>
                      </table>
                      <div class="row">
                          <div class="col-8"><h4>TOTAL</h4></div>
                          <div class="col-4 fa-pull-right">$ {{ number_format('1111') }}</div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
   
@endsection