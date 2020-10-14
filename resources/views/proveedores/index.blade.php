@extends('layouts.plantilla')
@section('titulo')
    PROVEEDORES
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
              <h4 class="card-title">PROVEEDORES</h4>
          </div>
          <div class="col-6">
              <button class="btn btn-primary fa-pull-right" data-toggle="modal" data-target="#registrar">
                  <span class="btn-label">
                      <i class="fa fa-plus"></i>
                  </span>
                  Nuevo Proveedor
              </button>
              @include('proveedores.registrar')
          </div>
      </div> 
  </div>
  <div class="card-body table-responsive">
      <table class="table table-striped" id="table">
          <thead>
            <tr>
              <th scope="col">NOMBRE</th>
              <th scope="col">DIRECCION</th>
              <th scope="col">EMAIL</th>
              <th scope="col">TELEFONO</th>
              <th scope="col">ACCIONES</th>
            </tr>
          </thead>
          <tbody>
              <?php $num=0; ?>
              @foreach ($proveedores as $proveedor)
                  <?php $num++; ?>
                  <tr>
                      <td>{{ $proveedor->nombre }}</td>
                      <td>{{ $proveedor->direccion }}</td>
                      <td>{{ $proveedor->email }}</td>
                      <td>{{ $proveedor->telefono }}</td>
                      <td  style="width: 15px">
                          <button type="button" class="btn btn-sm btn-icon btn-round btn-primary" data-toggle="modal" data-target="#actualizar<?=$num?>">
                              <i class="fas fa-pencil-alt"></i>
                          </button>
                      </td>
                      @include('proveedores.actualizar')
                  </tr>
              @endforeach
          </tbody>
        </table>
  </div>
</div>
@endsection