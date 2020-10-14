@extends('layouts.plantilla')
@section('titulo')
    USUARIOS
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
              <h4 class="card-title">USUARIOS</h4>
          </div>
          <div class="col-6">
              <button class="btn btn-primary fa-pull-right" data-toggle="modal" data-target="#registrar">
                  <span class="btn-label">
                      <i class="fa fa-plus"></i>
                  </span>
                  Usuario
              </button>
              @include('usuarios.registrar')
          </div>
      </div> 
  </div>
  <div class="card-body table-responsive">
      <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">NOMBRE</th>
              <th scope="col">CORREO</th>
              <th scope="col">ROL</th>
              <th scope="col">ACCIONES</th>
            </tr>
          </thead>
          <tbody>
              <?php $num=0; ?>
              @foreach ($usuarios as $usuario)
                  <?php $num++; ?>
                  <tr>
                      <td>{{ $usuario->name }}</td>
                      <td>{{ $usuario->email }}</td>
                      <td>{{ $usuario->nombreRoles }}</td>
                      <td>
                          <button type="button" class="btn btn-sm btn-icon btn-round btn-primary" data-toggle="modal" data-target="#actualizar<?=$num?>">
                              <i class="fas fa-pencil-alt"></i>
                          </button>
                          <button type="button" class="btn btn-sm btn-icon btn-round btn-danger" data-toggle="modal" data-target="#eliminar<?=$num?>">
                              <i class="fas fa-trash-alt"></i>
                          </button>
                      </td>
                      @include('usuarios.eliminar')
                      @include('usuarios.actualizar')
                  </tr>
              @endforeach
          </tbody>
        </table>
  </div>
</div>
@endsection