<?php

namespace App\Http\Controllers;

use App\Models\DetallesDeInventarios;
use App\Models\Productos;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    
    public function index()
    {
        $productos = DetallesDeInventarios::select('detalles_de_inventarios.*','productos.nombre as nombreP',
                    'productos.precio', 'productos.iva as iva','inventarios.id_sucursales')
                    ->join('productos', 'detalles_de_inventarios.id_productos','=', 'productos.id')
                    ->join('inventarios', 'detalles_de_inventarios.id_inventarios','=', 'inventarios.id')
                    ->get();

        return view('productos.index', compact('productos'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required'
        ]);

        $newProducto = new Productos();

        $newProducto->nombre=$request->nombre;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
