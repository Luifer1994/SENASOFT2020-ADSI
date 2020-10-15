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
                        <th scope="col">PRODUCTO</th>
                        <th scope="col">PRECIO</th>
                        <th scope="col">AGREGAR</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $num=0; ?>
                        @foreach ($productos as $producto)
                            <?php $num++; ?>
                            <tr>
                                <td>{{ $producto->nombreP }}</td>
                                <td>$ {{number_format($producto->precioP)}}</td>
                                <td style="width: 100px">
                                  <form action="{{ route('venta.store') }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <input type="hidden" name="idP" value="{{ $producto->id_productos }}">
                                        <input type="hidden" name="precio" value="{{ $producto->precioP }}">
                                        <input type="hidden" name="nombreP" value="{{ $producto->nombreP }}">
                                        <div class="form-group col-md-7">
                                            <input type="text" name="cantidad" class="form-control">
                                        </div>
                                        <div class="form-group col-md-5">
                                          <button title="AGREGAR A LA COMPRA" type="submit" class="btn btn-sm btn-round btn-danger">
                                            <i style="font-size: 20px" class="fas fa-cart-plus"></i>
                                          </button>
                                        </div>
                                    </div>
                                  </form>                                
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
          <div class="col-sm-6 col-md-6">
            <div style="text-align: right">
              <button type="button" class="btn btn-round btn-warning" data-toggle="modal" data-target="#lista">
                LISTA DE CLIENTES
              </button>
               @include('ventas.listClientes')
              <button type="button" class="btn btn-round btn-info" data-toggle="modal" data-target="#cliente<?=$num?>">
                NUEVO CLIENTE
              </button>
              @include('ventas.clientes')
            </div>
            <br>
              <div class="card card-stats card-round">
                <div class="card-header">
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
                            <tr>
                              <?php $valor = $item->cantidad*$item->precioPro ?>
                                <td>{{ $item->nombrePro }}</td>
                                <td>{{ $item->cantidad }}</td>
                                <td>$ {{ number_format($item->precioPro)}}</td>
                                <td>$ {{ number_format($valor)}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                      <div class="row">
                         <div class="col-6">
                           <h3>IVA</h3>
                         </div>
                         <div class="col-6">
                            <h3 class="pull-right">$ {{number_format($iva)}}</h3>
                         </div>
                      </div>
                      <div class="row">
                        <div class="col-6">
                          <h3>SUB TOTAL</h3>
                        </div>
                        <div class="col-6">
                          <h3 class="pull-right">$ {{number_format($suma)}}</h3>
                        </div>
                     </div>
                     <div class="row">
                      <div class="col-6">
                        <h3>TOTAL A PAGAR</h3>
                      </div>
                      <div class="col-6">
                        <h3 class="pull-right">$ {{number_format($suma+$iva)}}</h3>
                      </div>
                   </div>
                   <div class="row">
                     <div class="col-12">
                        <form action="{{ route('guardarF') }}" method="POST">
                          @csrf
                          <input name="id" type="hidden" value="{{ Auth::user()->id }}">
                          <button type="submit" title="PAGAR" class="btn btn-block btn-success">
                            PAGAR
                          </button>
                        </form>
                     </div>
                   </div>
                  </div>
              </div>
          </div>
      </div>
@endsection
