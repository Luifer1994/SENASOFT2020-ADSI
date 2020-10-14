<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\Sucursales;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function index()
    {
        //instalancia al modelo Roles en 
        $roles = Roles::all();
        //instancia al modelo Sucursales
        $sucursales = Sucursales::all();
        //instancia al modelo Users y hacemos join con las tablas Roles y Sucursales
        $usuarios = User::select('users.*', 'sucursales.nombre as nombreSucursal', 'roles.nombre as nombreRoles')
                            ->join('sucursales', 'users.id_sucursales', '=', 'sucursales.id')
                            ->join('roles', 'users.id_roles', '=', 'roles.id')
                            ->get();
        //Retornamos la vista index de los usuarios y le pasamos las variables que contienen los datos de la tabla
        return view('usuarios.index', compact('usuarios', 'roles', 'sucursales'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'rol' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'sucursal' => ['required',],
            'password' => ['required'],
        ]);


        $user = new User();

        $user->name=$request->name;
        $user->id_roles=$request->rol;
        $user->id_sucursales=$request->sucursal;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);

        $user->save();

        return back()->with('mensaje', 'Usuario Registro exito');
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
            'email'=> 'required|email',
            'rol' => 'required',
            'sucursal' => 'required'
        ]);
         $usuario = User::find($id);

         $usuario->name=$request->name;
         $usuario->email=$request->email;
         $usuario->id_sucursales=$request->sucursal;
         $usuario->id_roles=$request->rol;

         $usuario->save();

         return back()->with('mensaje', 'ACTUALIZACION EXITOSA');
    }

    public function destroy($id)
    {
        $usuario = User::find($id);

        $usuario->delete();

        return back()->with('mensaje', 'USUARIOS ELIMINADO CON EXITO');
    }
}
