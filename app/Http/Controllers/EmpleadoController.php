<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class EmpleadoController extends Controller
{
    //

    public function index(){

        $empleados = Empleado::all();

        return view("Empleado",compact('empleados'));

    }

    public function save(Request $request){

        $new_empleado = new Empleado();
        $new_empleado->name = $request->txtNombre;
        $new_empleado->apellido = $request->txtApellido;
        $new_empleado->edad = $request->txtEdad;

        $new_empleado->save();

    }

    public function editar(Request $request){

        $new_empleado = Empleado::find($request->txtId);
        $new_empleado->name = $request->txtNombre;
        $new_empleado->apellido = $request->txtApellido;
        $new_empleado->edad = $request->txtEdad;

        $new_empleado->save();

    }

    public function delete(Request $request){

        $new_empleado = Empleado::destroy($request->id);

    }
    
}
