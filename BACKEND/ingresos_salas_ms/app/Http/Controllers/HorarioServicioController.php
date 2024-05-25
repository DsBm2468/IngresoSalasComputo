<?php
  namespace App\Http\Controllers; //namespace es la dirección de la ubicacion de la clase que estamos trabajando

use App\Models\Horario;
use Illuminate\Http\Request;

  class HorarioServicioController extends Controller{

      function index(){
        $horarios = Horario::all();//esta linea hace lo mismo que el SELECT * FROM ... todo el proceso para incluir datos a la base de datos la hace de forma más rapida
        $data = ['data' => $horarios];//forma de estructurar la respuesta (OPCIONAL)
        return response()->json($data);//generar la respuesta en formato json
      }
      
      function show($id){
        $horarios = Horario::find($id);
        $data = ['data' => $horarios];//forma de estructurar la respuesta (OPCIONAL)
        return response()->json($data);
      }

      function store(Request $request){
        $datos = $request->all();
        $horario = new Horario();
        $horario->dia = $datos['dias'];
        $horario->save();
        $data = ['data' => $horario];
        return response()->json($data);
      }
  }
?>