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
        $facturaTemporal = FacturasTemporales::select('facturas_temporales.*', 'productos.nombre as nombreP',
                                                        'users.name as nombreU', 'clientes.nombre as nombreC',
                                                    'productos.precio', 'productos.iva')
                                                    ->join('productos', 'facturas_temporales.id_productos', '=', 'productos.id')
                                                    ->join('users', 'facturas_temporales.id_usuarios', '=', 'users.id')
                                                    ->join('clientes', 'facturas_temporales.id_clientes', '=', 'clientes.id')
                                                    ->get();

        $productos = DetallesDeInventarios::select('detalles_de_inventarios.*','productos.nombre as nombreP',
                    'productos.precio as precioP', 'productos.iva as iva','inventarios.id_sucursales')
        ->join('productos', 'detalles_de_inventarios.id_productos','=', 'productos.id')
        ->join('inventarios', 'detalles_de_inventarios.id_inventarios','=', 'inventarios.id')
        ->where('detalles_de_inventarios.cantidad', '>','0')
        ->get();
        return view('ventas.index', compact('facturaTemporal', 'productos', 'clientes'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        return $request->id;
    }

    public function show(Request $request)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        
    }


    public function destroy($id)
    {
        //
    }
}
