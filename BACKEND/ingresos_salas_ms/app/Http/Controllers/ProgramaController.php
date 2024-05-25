<?php

namespace App\Http\Controllers;

use App\Models\Programa;
use Illuminate\Http\Request;

class ProgramaController extends Controller{
    function index()//Consulta general de todos los datos
    {
        $prog = Programa::all();//esta linea hace lo mismo que el SELECT * FROM ... todo el proceso para incluir datos a la base de datos la hace de forma más rapida
        $data = ['data' => $prog];//forma de estructurar la respuesta (OPCIONAL)
        return response()->json($data);//generar la respuesta en formato json
    }

    function show($id)//consulta especifica (un solo dato)
    {
        $prog = Programa::find($id);//llamas a los datos como en index pero se escribe::find()
        $data = ['data' => $prog];//forma de estructurar la respuesta (OPCIONAL)
        return response()->json($data);//generar la respuesta en formato json
    }

    function store(Request $request){//Registrar un nuevo elemento (insert into ...) 
        $datos = $request->all();
        $prog = new Programa();
        $prog->nombre = $datos['nombre'];
        $prog->save();
        $data = ['data' => $prog];
        return response()->json($data);
    }

    function update($id, Request $request){ // request lo q hace es capturar los datos enviados por un cliente
    //hacer cambios(modificaciones)
    //para eso, en este caso se necesita el id y el request 
    //( permite el acceso a toda la información que pasa desde el cliente (nave) al servidor.)
        $datos = $request->all();
        $prog = Programa::find($id); //se llamaron los datos
        $prog->nombre = $datos['nombre'];
        $prog->save();//guardo los cambios
        $data = ['data' => $prog];
        return response()->json($data);// esta linea de codigo quiere decir q regrese una respuesta con la variable $data
    }

    function destroy($id)
    {
        $prog = Programa::find($id);
        if (empty($ingreso)) {
            $data = ['data' => 'No se encuentran registros de los programas'];
            return response()->json($data, 404);
        }
        $prog->delete();
        $data = ['data' => 'Datos eliminados'];
        return response()->json($data); // esta linea de codigo quiere decir q regrese una respuesta con la variable $data
    }
}
