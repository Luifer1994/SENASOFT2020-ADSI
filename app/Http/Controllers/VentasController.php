<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\DetallesDeInventarios;
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
        
        $total =$request->cantidad*$request->precio;

        $facturaTemporal = new FacturasTemporales();

        $facturaTemporal->cantidad=$request->cantidad;
        $facturaTemporal->id_clientes=null;
        $facturaTemporal->id_productos=$request->idP;
        $facturaTemporal->id_usuarios=Auth::user()->id;
        $facturaTemporal->total=$total;

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
}
