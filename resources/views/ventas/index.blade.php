@extends('layouts.plantilla')
@section('titulo')
    VENTAS
@endsection
@section('contenido')
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
  
      <div class="row">
        <div class="col-sm-6 col-md-6">
            <div class="card card-stats card-round">
              <div class="card-header">
                  <div class="row">
                      <div class="col-6">
                          <h4 class="card-title">PRODUCTOS</h4>
                      </div>
                  </div> 
              </div>
                <div class="card-body table-responsive">
                  <table class="table table-striped" id="table">
                    <thead>
                      <tr>
                        <th scope="col">PRODUCTO</th>
                        <th scope="col">PRECIO</th>
                        <th scope="col">AGREGAR</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $num=0; ?>
                        @foreach ($productos as $producto)
                            <?php $num++; ?>
                            <tr>
                                <td>{{ $producto->nombreP }}</td>
                                <td>$ {{number_format($producto->precioP)}}</td>
                                <td style="width: 100px">
                                  <form action="{{ route('venta.store') }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <input type="hidden" name="producto" value="{{ $producto->id_productos }}">
                                        <div class="form-group col-md-7">
                                            <input type="text" name="cantidad" class="form-control">
                                        </div>
                                        <div class="form-group col-md-5">
                                          <button title="AGREGAR A LA COMPRA" type="submit" class="btn btn-sm btn-round btn-danger">
                                            <i style="font-size: 20px" class="fas fa-cart-plus"></i>
                                          </button>
                                        </div>
                                    </div>
                                  </form>                                
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
          <div class="col-sm-6 col-md-6">
            <div style="text-align: right">
              <button type="button" class="btn btn-round btn-warning" data-toggle="modal" data-target="#lista">
                LISTA DE CLIENTES
              </button>
               @include('ventas.listClientes')
              <button type="button" class="btn btn-round btn-info" data-toggle="modal" data-target="#cliente<?=$num?>">
                NUEVO CLIENTE
              </button>
              @include('ventas.clientes')
            </div>
            <br>
              <div class="card card-stats card-round">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="card-title">FACTURA</h4>
                        </div>
                    </div> 
                </div>
                  <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">PRODUCTO</th>
                            <th scope="col">CANTIDAD</th>
                            <th scope="col">PRECIOx1</th>
                            <th scope="col">VALOR</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($facturaTemporal as $item)
                                <td>{{ $item->nombreP }}</td>
                                <td>{{ $item->cantidad }}</td>
                                <td>$ {{ number_format($item->precio)}}</td>
                                <td>$ {{ number_format($item->cantidad*$item->precio)}}</td>
                            @endforeach
                          <tr>
                          </tr>
                        </tbody>
                      </table>
                      <div class="row">
                          <div class="col-8"><h4>TOTAL</h4></div>
                          <div class="col-4 fa-pull-right">$ {{ number_format('1111') }}</div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <script>
        $(document).ready(function() {
            $('#basic-datatables').DataTable({});
    
            $('#multi-filter-select').DataTable({
                "pageLength": 5,
                initComplete: function() {
                    this.api().columns().every(function() {
                        var column = this;
                        var select = $('<select class="form-control"><option value=""></option></select>')
                            .appendTo($(column.footer()).empty())
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );
    
                                column
                                    .search(val ? '^' + val + '$' : '', true, false)
                                    .draw();
                            });
    
                        column.data().unique().sort().each(function(d, j) {
                            select.append('<option value="' + d + '">' + d + '</option>')
                        });
                    });
                }
            });
    
            // Add Row
            $('#list').DataTable({
                "language": { 
                "sProcessing": "Procesando...", 
                "sLengthMenu": "Mostrar _MENU_", 
                "sZeroRecords": "No se encontraron resultados", 
                "sEmptyTable": "Ningún dato disponible en esta tabla", 
                "sInfo":   "del _START_ al _END_ de _TOTAL_ registros", 
                "sInfoEmpty":  "Mostrando  del 0 al 0 de un total de 0", 
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)", 
                "sInfoPostFix": "", 
                "sSearch":  "Buscar:", 
                "sUrl":   "", 
                "sInfoThousands": ",", 
                "sLoadingRecords": "Cargando...", 
                "oPaginate": { 
                "sFirst": "Primero", 
                "sLast": "Último", 
                "sNext": "Siguiente", 
                "sPrevious": "Anterior" 
                }, 
                "oAria": { 
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente", 
                "sSortDescending": ": Activar para ordenar la columna de manera descendente" 
                } 
                } 
            }); 
    
            var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';
    
            $('#addRowButton').click(function() {
                $('#add-row').dataTable().fnAddData([
                    $("#addName").val(),
                    $("#addPosition").val(),
                    $("#addOffice").val(),
                    action
                ]);
                $('#addRowModal').modal('hide');
    
            });
        });
    </script>
@endsection
