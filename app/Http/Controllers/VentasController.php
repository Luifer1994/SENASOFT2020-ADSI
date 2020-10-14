<?php

namespace App\Http\Controllers;

use App\Models\FacturasTemporales;
use Illuminate\Http\Request;

class VentasController extends Controller
{
    
    public function index()
    {
        $facturaTemporal = FacturasTemporales::all();
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
