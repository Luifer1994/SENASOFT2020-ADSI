<?php

namespace App\Http\Controllers;

use App\Models\Compras;
use App\Models\DetallesDeCompras;
use App\Models\DetallesDeInventarios;
use App\Models\Inventarios;
use App\Models\Productos;
use App\Models\Proveedores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductosController extends Controller
{
    
    public function index()
    {
        $proveedores = Proveedores::all();
        $productos = DetallesDeInventarios::select('detalles_de_inventarios.*','productos.nombre as nombreP','productos.id as id_producto',
                    'productos.precio', 'productos.id_proveedores', 'productos.iva as iva','inventarios.id_sucursales')
                    ->join('productos', 'detalles_de_inventarios.id_productos','=', 'productos.id')
                    ->join('inventarios', 'detalles_de_inventarios.id_inventarios','=', 'inventarios.id')
                    ->get();

        return view('productos.index', compact('productos', 'proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //VALIDO DATOS DEL FORMULARIO
        $request->validate([
            'nombre' => 'required',
            'proveedor' => 'required',
            'precio' => 'required'
        ]);

        //ISTANCIO EL MODELO PRODUCTOS
        $newProducto = new Productos();

        //AGREGO UNA VARIABLE IVA CON 19 DE VALOR YA QUE EL REQUERIMEIENTO ES CLARO Y PIDE QUE TODOS LOS
        //PRODUCTOS DEBEN TENER UN 19%, POR ESO LE AGREGO 19 PARA PODER JUGAR CON EL MAS ADELANTE DONDE LO NECESITARE
        $iva = 19;

        //LLENO LOS CAMPOS DE MI TABLA PRODUCTOS LA CUAL INSTANCIE DESDE EL MODELO EN LA VARIABLE $newProducto
        $newProducto->nombre=$request->nombre;
        $newProducto->id_proveedores=$request->proveedor;
        $newProducto->precio=$request->precio;
        $newProducto->iva=$iva;

        //GUARDO LOS DATOS
        $newProducto->save();
        
        //LLAMO POR EL METODO latest, AL ULTIMO PRODUCTO GUARDADO  
        $data1 = Productos::latest('id')->first();

        //INTANCIO EL MODELO INVENTARIOS
        $inventario = new Inventarios();

        //LLENO LOS DATOS DE LA TABLA INVENTARIO DONDE EL CAMPO id_usuarios, LA LLENO CON INFORMACION DEL USUARIO LOGEADO
        $inventario->id_sucursales=Auth::user()->id_sucursales;

        //GUARDO
        $inventario->save();

        //LLAMO POR EL METODO latest, AL ULTIMO PRODUCTO GUARDADO 
        $data2 = Inventarios::latest('id')->first();

        //INTANCIO EL MODELO DetallesDeInventarios
        $detalleInventario = new DetallesDeInventarios();

        //LLENO  LOS CAMPOS, EL CAMPO CANTIDAD HACE REFERENCIA AL STOCK DE PRODUCTOS EN BASE DE DATOS
        $detalleInventario->cantidad=0;
        //LLENO ESTE CAMPO CON EL ID DEL ULTIMO INVENTARIO CREADO
        $detalleInventario->id_inventarios= $data2->id;
        //Y ESTE CON EL ID DEL ULTIMO PRODUCTO AGREGADO
        $detalleInventario->id_productos  = $data1->id;

        //GUARDO
        $detalleInventario->save();

        //RETORNO A LA VISTA ANTERIOS Y MANDO UN MENSAJE DE EXITO
        return back()->with('mensaje','REGISTRO EXITOSO');
        
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            ['entrada' => 'required']
        );
        //INSTANCIO NUESTRO MODELO Compras
        $compra = new Compras();

        //LLENO LOS CAMPOS DE NUESTRA TABLA CON DATOS QUE MANDO DEL FORMULARIO CABE RECALCAR QUE ESTOS
        //CAMPOS VIENEN OCULTOS PERO ESTAN DENTRO DE LA VARIABLE $request;
        $compra->id_proveedores=$request->proveedor;
        $compra->id_usuarios=$request->usuario;

        //GUARDO 
        $compra->save();
        //RETORNO LA ULTIMA COMPRA REALIZADA
        $data1 = Compras::latest('id')->first();


        //INTANCIO NUESTRO MODELO DetallesDeCompras
        $detalleCompra = new DetallesDeCompras();

        //LLENO LOS CAMPOS DE NUESTRA TABLA CON LOS DATOS QUE VIENEN TANTO DE LA ULTIMA COMPRA COMO DE FORMULARIO
        $detalleCompra->id_compras=$data1->id;
        $detalleCompra->cantidad=$request->entrada;
        $detalleCompra->id_productos=$request->producto;
        
        //GUARDO
        $detalleCompra->save();

        //INTANCIAMOS EL MODELO DetallesDeInventarios QUE SEA IGUAL AL $id QUE MANDAMOS EN EL FORMULARIO
        $detalleInventario = DetallesDeInventarios::find($id);

        //ACTUALIZAMOS EL STOCK 
        $detalleInventario->cantidad=$detalleInventario->cantidad+$request->entrada;

        //GUARDAMOS
        $detalleInventario->save();

        //RETORNAMOS A LA VISTA ANTERIOR Y MADAMOS UN MENSAJE DE EXITO
        return back()->with('mensaje', 'ENTRADA DE PRODUCTO REALIZADA CON EXITO');
      
    }

  
    public function destroy($id)
    {
        //
    }
}
