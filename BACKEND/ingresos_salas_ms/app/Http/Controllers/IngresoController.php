<?php

namespace App\Http\Controllers;

use App\Models\Ingreso;
use Illuminate\Http\Request;

class IngresoController extends Controller{
    function index()//Consulta general de todos los datos
    {
        $ingresos = Ingreso::all();//esta linea hace lo mismo que el SELECT * FROM ... todo el proceso para incluir datos a la base de datos la hace de forma más rapida
        $data = ['data' => $ingresos];//forma de estructurar la respuesta (OPCIONAL)
        return response()->json($data);//generar la respuesta en formato json
    }

    function show($id)//consulta especifica (un solo dato)
    {
        $ingreso = Ingreso::find($id);//llamas a los datos como en index pero se escribe::find()
        $data = ['data' => $ingreso];//forma de estructurar la respuesta (OPCIONAL)
        return response()->json($data);//generar la respuesta en formato json
    }

    function store(Request $request){//Registrar un nuevo elemento (insert into ...) 
        $datos = $request->all();
        $ingreso = new Ingreso();
        $ingreso->codigoEstudiante = $datos['codigoEstudiante'];
        $ingreso->nombreEstudiante = $datos['nombreEstudiante'];
        $ingreso->idPrograma = $datos['idPrograma'];
        $ingreso->fechaIngreso = $datos['fechaIngreso'];
        $ingreso->horaIngreso = $datos['horaIngreso'];
        $ingreso->horaSalida = $datos['horaSalida'];
        $ingreso->idResponsableSala = $datos['idResponsable'];
        $ingreso->idSala = $datos['idSala'];
        $ingreso->save();
        $data = ['data' => $ingreso];
        return response()->json($data);
    }

    function update($id, Request $request){//hacer cambios(modificaciones)
    //para eso, en este caso se necesita el id y el request 
    //( permite el acceso a toda la información que pasa desde el cliente (navegador) al servidor.)
        $datos = $request->all();
        $ingreso = Ingreso::find($id);//se llamaron los datos
        $ingreso->codigoEstudiante = $datos['codigoEstudiante'];//asigno los datos a mi modelo
        $ingreso->nombreEstudiante = $datos['nombreEstudiante'];
        $ingreso->idPrograma = $datos['idPrograma'];
        $ingreso->fechaIngreso = $datos['fechaIngreso'];
        $ingreso->horaIngreso = $datos['horaIngreso'];
        $ingreso->horaSalida = $datos['horaSalida'];
        $ingreso->idResponsableSala = $datos['idResponsable'];
        $ingreso->idSala = $datos['idSala'];
        $ingreso->save();//guardo los cambios
        $data = ['data' => $ingreso];
        return response()->json($data);
    }

    function destroy($id)
    {
        $ingreso = Ingreso::find($id);
        if (empty($ingreso)) {
            $data = ['data' => 'No se encuentra registrado el contacto'];
            return response()->json($data, 404);
        }
        $ingreso->delete();
        $data = ['data' => 'Datos eliminados'];
        return response()->json($data);
    }
}
