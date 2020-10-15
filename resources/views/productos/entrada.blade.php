<div class="modal fade" id="entrada<?=$num?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">DAR ENTRADA A: {{ $producto->nombreP }}</h5>
        </div>
        <div class="modal-body">
          <form action="{{ route('productos.update',$producto->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-row">
                    <input type="hidden" name="proveedor" value="{{ $producto->id_proveedores }}">
                    <input type="hidden" name="usuario" value="{{ Auth::user()->id }}">
                <div class="form-group col-md-12">
                    <label for="entrada">
                       Numero de Productos
                    </label>
                    <input type="number" name="entrada" value="{{ old('entrada') }}" class="form-control">
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