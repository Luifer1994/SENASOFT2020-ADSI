<div class="modal fade" id="actualizar<?=$num?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">ACTUALIZAR PROVEEDOR: {{ $proveedor->nombre }}</h5>
        </div>
        <div class="modal-body">
          <form action="{{ route('proveedores.update',$proveedor->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nombre">
                        Nombre
                    </label>
                    <input type="text" name="name" value="{{ $proveedor->nombre }}" class="form-control" placeholder="Nombre...">
                </div>
                <div class="form-group col-md-6">
                    <label for="correo">
                        Direccion
                    </label>
                    <input type="text" name="direccion" value="{{ $proveedor->direccion }}" class="form-control" placeholder="Direccion...">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="contraseña">
                        Correo
                    </label>
                    <input type="email" name="email" value="{{ $proveedor->email }}" class="form-control" placeholder="ejemplo@email.com...">
                </div>
                <div class="form-group col-md-6">
                    <label for="confirmarContraseña">
                        Telefono
                    </label>
                    <input type="text" name="telefono" value="{{ $proveedor->telefono }} " class="form-control" placeholder="Ingrese el numero de telefono">
                </div>
            </div>
            <hr>
            <div class="container text-center">
                <button type="submit" class="btn btn-primary">ACTUALIZAR</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>
            </div>
            </form>
        </div>
      </div>
    </div>
  </div>