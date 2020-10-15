<div class="modal fade" id="cliente<?=$num?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">REGISTRAR NUEVO CLIENTE</h5>
        </div>
        <div class="modal-body">
          <form action="{{ route('cliente.store') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="number" name="documento" value="{{ old('documento') }}" class="form-control" placeholder="Numero Documento">
                </div>
                <div class="form-group col-md-6">
                  <input type="nombre" name="nombre" placeholder="Nombre" value="{{ old('nombre') }}" class="form-control">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                  <input type="email" placeholder="Correo" name="email" value="{{ old('email') }}" class="form-control">
              </div>
              <div class="form-group col-md-6">
                <input type="number" placeholder="Telefono" name="telefono" value="{{ old('telefono') }}" class="form-control">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-12">
                  <input type="text" name="direccion" placeholder="Direccion" value="{{ old('direccion') }}" class="form-control">
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