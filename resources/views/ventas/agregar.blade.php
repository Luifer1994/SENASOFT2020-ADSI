<div class="modal fade" id="agregar<?=$num?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content">
        <div class="modal-body">

          <form action="{{ route('venta.store') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-12">
                    <h4>Cuantas unidades de {{ $producto->nombreP }} quieres agregar?</h4>
                    <input type="number" name="cantidad" value="{{ old('cantidad') }}" class="form-control">
                </div>
            </div>

            <hr>
            <div class="container text-center">
                <button type="submit" class="btn btn-primary">AGREGAR</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>