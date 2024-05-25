<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use Illuminate\Http\Request;

class SalaController extends Controller{
    function index()//Consulta general de todos los datos
    {
        $salas = Sala::all();//esta linea hace lo mismo que el SELECT * FROM ... todo el proceso para incluir datos a la base de datos la hace de forma más rapida
        $data = ['data' => $salas];//forma de estructurar la respuesta (OPCIONAL)
        return response()->json($data);//generar la respuesta en formato json
    }

    function show($id)//consulta especifica (un solo dato)
    {
        $salas = Sala::find($id);//llamas a los datos como en index pero se escribe::find()
        $data = ['data' => $salas];//forma de estructurar la respuesta (OPCIONAL)
        return response()->json($data);//generar la respuesta en formato json
    }

    function store(Request $request){//Registrar un nuevo elemento (insert into ...) 
        $datos = $request->all();
        $salas = new Sala();
        $salas->nombre = $datos['nombre'];
        $salas->save();
        $data = ['data' => $salas];
        return response()->json($data);
    }

    function update($id, Request $request){//hacer cambios(modificaciones)
    //para eso, en este caso se necesita el id y el request 
    //( permite el acceso a toda la información que pasa desde el cliente (navegador) al servidor.)
        $datos = $request->all();
        $salas = Sala::find($id);//se llamaron los datos
        $salas->nombre = $datos['nombre'];
        $salas->save();//guardo los cambios
        $data = ['data' => $salas];
        return response()->json($data);
    }

    function destroy($id)
    {
        $salas = Sala::find($id);
        if (empty($ingreso)) {
            $data = ['data' => 'No se encuentran registros de las salas'];
            return response()->json($data, 404);
        }
        $salas->delete();
        $data = ['data' => 'Datos eliminados'];
        return response()->json($data);
    }
}
