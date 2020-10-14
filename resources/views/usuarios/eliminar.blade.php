<div class="modal fade" id="eliminar<?=$num?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">ELIMINAR USUARIO</h5>
        </div>
        <div class="modal-body">
          <form action="{{ route('user.destroy', $usuario->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="container text-center">
              <h4>Estas seguro que deseas eliminar este registro <span class="text-danger">{{ $usuario->name }}</span></h4>
            </div>
            <div class="conbtainer text-center">
              <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>
              <button type="submit" class="btn btn-primary">ACEPTAR</button>
            </div>
         </form>
        </div>
      </div>
    </div>
</div>