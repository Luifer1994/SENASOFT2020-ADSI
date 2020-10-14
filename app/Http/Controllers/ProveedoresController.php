<?php

namespace App\Http\Controllers;

use App\Models\Proveedores;
use Illuminate\Http\Request;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $proveedores = Proveedores::all();

        return view('proveedores.index', compact('proveedores'));
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
        $request->validate([
        'name' => 'required',
        'direccion' => 'required',
        'email' => 'required|email',
        'telefono' => 'required'
        ]);

        $newProveedor = new Proveedores();

        $newProveedor->nombre=$request->name;
        $newProveedor->direccion=$request->direccion;
        $newProveedor->email=$request->email;
        $newProveedor->telefono=$request->telefono;

        $newProveedor->save();

        return back()->with('mensaje', 'PROVEEDOR REGISTRADO CON EXITO');
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
        $request->validate([
            'name' => 'required',
            'direccion' => 'required',
            'email' => 'required|email',
            'telefono' => 'required'
        ]);

        $proveedor = Proveedores::find($id);

        $proveedor->nombre=$request->name;
        $proveedor->direccion=$request->direccion;
        $proveedor->email=$request->email;
        $proveedor->telefono=$request->telefono;

        $proveedor->save();

        return back()->with('mensaje', 'PROVEEDOR ACTUALIZADO CON EXITO');
    }

    public function destroy($id)
    {
        //
    }
}
