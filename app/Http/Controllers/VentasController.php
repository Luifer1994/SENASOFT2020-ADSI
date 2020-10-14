<?php

namespace App\Http\Controllers;

use App\Models\FacturasTemporales;
use Illuminate\Http\Request;

class VentasController extends Controller
{
    
    public function index()
    {
        $facturaTemporal = FacturasTemporales::select('facturas_temporales.*', 'productos.nombre as nombreP',
                                                        'users.name as nombreU', 'clientes.nombre as nombreC',
                                                    'productos.precio', 'productos.iva')
                                                    ->join('productos', 'facturas_temporales.id_productos', '=', 'productos.id')
                                                    ->join('users', 'facturas_temporales.id_usuarios', '=', 'users.id')
                                                    ->join('clientes', 'facturas_temporales.id_clientes', '=', 'clientes.id')
                                                    ->get();
        return view('ventas.index', compact('facturaTemporal'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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
        //
    }


    public function destroy($id)
    {
        //
    }
}
