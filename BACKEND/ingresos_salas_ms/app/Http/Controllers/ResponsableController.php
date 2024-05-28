<?php

namespace App\Http\Controllers;

use App\Models\Responsable;
// use Illuminate\Http\Request;

class ResponsableController extends Controller{
    function index()//Consulta general de todos los datos
    {
        $resp = Responsable::all();//esta linea hace lo mismo que el SELECT * FROM ... todo el proceso para incluir datos a la base de datos la hace de forma más rapida
        $data = ['data' => $resp];//forma de estructurar la respuesta (OPCIONAL)
        return response()->json($data);//generar la respuesta en formato json
    }

    function show($id)//consulta especifica (un solo dato)
    {
        $resp = Responsable::find($id);//llamas a los datos como en index pero se escribe::find()
        $data = ['data' => $resp];//forma de estructurar la respuesta (OPCIONAL)
        return response()->json($data);//generar la respuesta en formato json
    }




    // function store(Request $request){//Registrar un nuevo elemento (insert into ...) 
    //     $datos = $request->all();
    //     $resp = new Responsable();
    //     $resp->nombre = $datos['nombre'];
    //     $resp->save();
    //     $data = ['data' => $resp];
    //     return response()->json($data);
    // }

    // function update($id, Request $request){ // request lo q hace es capturar los datos enviados por un cliente
    //     $datos = $request->all();
    //     $resp = Responsable::find($id);//se llamaron los datos
    //     $resp->nombre = $datos['nombre'];
    //     $resp->save();//guardo los cambios
    //     $data = ['data' => $resp];
    //     return response()->json($data);// esta linea de codigo quiere decir q regrese una respuesta con la variable $data
    // }

    // function destroy($id)
    // {
    //     $resp = Responsable::find($id);
    //     if (empty($ingreso)) {
    //         $data = ['data' => 'No se encuentran registros de los responsables'];
    //         return response()->json($data, 404);
    //     }
    //     $resp->delete();
    //     $data = ['data' => 'Datos eliminados'];
    //     return response()->json($data); // esta linea de codigo quiere decir q regrese una respuesta con la variable $data
    // }
}
