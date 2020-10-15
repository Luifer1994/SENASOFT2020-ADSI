<div class="modal fade" id="lista" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">REGISTRAR NUEVO CLIENTE</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="card-body table-responsive">
                <table class="table table-striped" id="list">
                    <thead>
                      <tr>
                        <th scope="col">DOCUMENTO</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">ACCION</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $num=0; ?>
                        @foreach ($clientes as $cliente)
                            <?php $num++; ?>
                            <tr>
                                <td>{{ $cliente->documento }}</td>
                                <td>{{ $cliente->nombre }}</td>
                                <td style="width: 100px">
                                  <form action="{{ route('venta.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="cliente" value="{{$cliente->id }}">
                                    <button title="SELECCIONAR CLIENTE" type="submit" class="btn btn-sm btn-round btn-danger">
                                     Seleccionar
                                    </button>
                                  </form>                                
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table> 
            </div>
        </div>
      </div>
    </div>
  </div>
