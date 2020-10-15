@extends('layouts.plantilla')
@section('titulo')
    PRODUCTOS
@endsection
@section('contenido')
<div class="card">
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
  <div class="card-header">
      <div class="row">
          <div class="col-6">
              <h4 class="card-title">PRODUCTOS</h4>
          </div>
          <div class="col-6">
              <button class="btn btn-primary fa-pull-right" data-toggle="modal" data-target="#registrar">
                  <span class="btn-label">
                      <i class="fa fa-plus"></i>
                  </span>
                  Nuevo Producto
              </button>
              @include('productos.registrar')
          </div>
      </div> 
  </div>
  <div class="card-body table-responsive">
      <table class="table table-striped" id="table">
          <thead>
            <tr>
              <th scope="col">NOMBRE</th>
              <th scope="col">PRECIO</th>
              <th scope="col">STOCK</th>
              <th scope="col">ACCIONES</th>
            </tr>
          </thead>
          <tbody>
              <?php $num=0; ?>
              @foreach ($productos as $producto)
                  <?php $num++; ?>
                  <tr>
                      <td>{{ $producto->nombreP }}</td>
                      <td>$ {{number_format($producto->precio)}}</td>
                      <td @if ($producto->cantidad <= 10)
                          class="bg-danger-gradient"
                      @endif>{{ $producto->cantidad }}</td>
                      <td  style="width: 10px">
                          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#entrada<?=$num?>">
                            DarEntrada <i style="font-size: 20px" class="fas fa-arrow-alt-circle-up"></i>
                          </button>
                      </td>
                      @include('productos.entrada')
                  </tr>
              @endforeach
          </tbody>
        </table>
  </div>
</div>
@endsection