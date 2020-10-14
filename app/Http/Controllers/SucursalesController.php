<?php

namespace App\Http\Controllers;

use App\Models\Sucursales;
use Illuminate\Http\Request;

class SucursalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //instanciamos el modelo Sucursales en la variable $sucursales
        $sucursales = Sucursales::all();

        //RETORNAMOS LA VISTA sucursales.index Y LE PASAMOS POR METODO COMPAC la variablae 
        //$sucursales donde instanciamos el modelo
        return view('sucursales.index', compact('sucursales'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //VALIDAMOS LOS CAMPOS QUE VIENEN DEL FORMULARIO DE REGISTRAR 
        $request->validate([
            'nombre' => 'required'
        ]);

        //INSTANCIAMOS LAS SUCURSALES
        $newSucursal = new Sucursales();

        //LLENAMOS LOS CAMPOS DE LA TABLA SUCURSALES  CON LOS CAMPOS QUE TRAIMOS DEL FORMAULAIO
        $newSucursal->nombre=$request->nombre;

        //GUARDAMOS LA SUCURSAL
        $newSucursal->save();

        //RETORNAMOS A LA VISTA DONDE ESTABVAMOS Y MANDAMOS UN MENSAJE
        return back()->with('mensaje', 'SUCURSAL CREADA CON EXITO');
    }

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

    public function update(Request $request, $id)
    {
        //VALIDAMOS LOS CAMPOS QUE VIENEN DEL FORMAULARIO DE ACTUALIZAR
        $request->validate([
            'nombre' => 'required'
        ]);

        //INSTANCIAMOS EL MODELO Sucursales y le pasamos el $id que se viene con el formulario
        //para que muestre solo la surcusal que tenga el id igual al parametro $id
        $sucursal = Sucursales::find($id);

        //llenamos los datos de nuestra tabla
        $sucursal->nombre=$request->nombre;
       
        //guardamos los campos
        $sucursal->save();
        //retornamos a la vista anterios y pasamos por metodo with un mensaje de exito
        return back()->with('mensaje', 'SUCURSAL ACTUALIZADA CON EXITO');
    }

    public function destroy($id)
    {
        $sucursal = Sucursales::find($id);

        $sucursal->delete();

        return back()->with('mensaje', 'SUCURSAL ELIMINADA CON EXITO');
    }
}
