<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\DetallesDeInventarios;
use App\Models\DetallesFacturas;
use App\Models\Facturas;
use App\Models\FacturasTemporales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VentasController extends Controller
{
    
    public function index()
    {
        
        $clientes = Clientes::all();

        $facturaTemporal = FacturasTemporales::select('facturas_temporales.*', 'productos.nombre as nombrePro', 'productos.precio as precioPro')
        ->join('productos', 'facturas_temporales.id_productos', '=', 'productos.id')
        ->get();
        $suma = DB::table('facturas_temporales')->sum('total');

        $iva = $suma*19/100;
    

        $productos = DetallesDeInventarios::select('detalles_de_inventarios.*','productos.nombre as nombreP',
                    'productos.precio as precioP', 'productos.iva as iva','inventarios.id_sucursales')
        ->join('productos', 'detalles_de_inventarios.id_productos','=', 'productos.id')
        ->join('inventarios', 'detalles_de_inventarios.id_inventarios','=', 'inventarios.id')
        ->where('detalles_de_inventarios.cantidad', '>','0')
        ->get();
        return view('ventas.index', compact('facturaTemporal', 'productos', 'clientes', 'suma', 'iva'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'cantidad' => 'required'
        ]);
        
        $total =$request->cantidad*$request->precio;

        $facturaTemporal = new FacturasTemporales();

        $facturaTemporal->cantidad=$request->cantidad;
        $facturaTemporal->id_clientes=null;
        $facturaTemporal->id_productos=$request->idP;
        $facturaTemporal->id_usuarios=Auth::user()->id;
        $facturaTemporal->total=$total;

        $detalleI= DB::table('detalles_de_inventarios')->where('id_productos', '=', $request->idP)->get();

        foreach ($detalleI as $detalle) {
            $inevntario = DetallesDeInventarios::find($detalle->id);
            $inevntario->cantidad=$inevntario->cantidad-$request->cantidad;
            $inevntario->save();
        }

        $facturaTemporal->save();



        return back();
    }

    public function show(Request $request)
    {
        
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $factura = DB::table('facturas_temporales')->where('id_usuarios', '=', $id)->get();
        
        
        foreach ($factura as $value) {
           $facturaTemporal = FacturasTemporales::find($value->id);
           $facturaTemporal->id_clientes=$request->id;
           $facturaTemporal->save();
        }
        return back();
    }


    public function destroy($id)
    {
        //
    }
    public function guardarFactura(Request $request)
    {
        $factura = DB::table('facturas_temporales')->where('id_usuarios', '=', $request->id)->get();
    
        foreach ($factura as $value) {

            if ($value->id_clientes) {
                $Factura = new Facturas();
                $Factura->id_clientes=$value->id_clientes;
                $Factura->id_usuarios=$value->id_usuarios;
                $Factura->id_productos=$value->id_productos;
                $Factura->cantidad=$value->cantidad;
                $Factura->save();
            }else {
                return back()->with('mensaje2', 'PAGO DENEGADO DEBES SELECCIONAR UN CLIENTE');
            }

         }
         $factura = DB::table('facturas_temporales')->where('id_usuarios', '=', Auth::user()->id)->get();
    
         foreach ($factura as  $key) {
             $facturaT = FacturasTemporales::find($key->id);
             $facturaT->delete();
         }

         return back()->with('mensaje', 'SU PAGO SE REALIZO CON EXITO');
    }
}
