<div class="modal fade" id="actualizar<?=$num?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">ACTUALIZAR USUARIO: {{ $sucursal->nombre }}</h5>
        </div>
        <div class="modal-body">
          <form action="{{ route('sucursal.update',$sucursal->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="nombre">
                        Nombre
                    </label>
                    <input type="text" name="nombre" value="{{ $sucursal->nombre }}" class="form-control">
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