<div class="modal fade" id="registrar" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">REGISTRAR NUEVO PRODUCTO</h5>
        </div>
        <div class="modal-body">

          <form action="{{ route('productos.store') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="nombre">
                        Nombre
                    </label>
                    <input type="text" name="nombre" value="{{ old('nombre') }}" class="form-control" placeholder="Nombre...">
                </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="nombre">
                    Proveedor
                </label>
                <select name="proveedor" id="proveedor" class="form-control">
                  <option value="">Seleccione...</option>
                  @foreach ($proveedores as $proveedor)
                      <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="precio">
                    Precio
                </label>
                  <input class="form-control" type="number" name="precio" value="{{ old('precio') }}" id="precio" placeholder="Ingresa el precio">
              </div>
          </div>
            <hr>
            <div class="container text-center">
                <button type="submit" class="btn btn-primary">REGISTRAR</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>