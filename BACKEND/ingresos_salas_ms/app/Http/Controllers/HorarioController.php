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

      /*function store(Request $request){
        $datos = $request->all();
        $horario = new Horario();
        $horario->dia = $datos['dias'];
      }*/

      function store(Request $request){//Registrar un nuevo elemento (insert into ...)
        $datos = $request->all();
        $horarios = new Horario();
        $horarios->dia = $datos['dia'];
        $horarios->materia = $datos['materia'];
        $horarios->horaInicio = $datos['horaInicio'];
        $horarios->horaFin = $datos['horaFin'];
        $horarios->idPrograma  = $datos['idPrograma'];
        $horarios->idSala  = $datos['idSala'];

        if($horarios){
          // CONDICION
        }
        $horarios->save();
        $data = ['data' => $horarios];
        return response()->json($data);
    }

    function update($id, Request $request){//hacer cambios(modificaciones)
      //para eso, en este caso se necesita el id y el request
      //( permite el acceso a toda la información que pasa desde el cliente (nave) al servidor.)
          $datos = $request->all();
          $horarios = Horario::find($id);//se llamaron los datos
          $horarios->dia = $datos['dia'];
          $horarios->materia = $datos['materia'];
          $horarios->horaInicio = $datos['horaInicio'];
          $horarios->horaFin = $datos['horaFin'];
          $horarios->idPrograma  = $datos['idPrograma'];
          $horarios->idSala  = $datos['idSala'];
          $horarios->save();
          $data = ['data' => $horarios];
          return response()->json($data);
      }

      // function destroy($id)
      // {
      //     $ingreso = Horario::find($id);
      //     if (empty($ingreso)) {
      //         $data = ['data' => 'No se encuentran salas ocupadas'];
      //         return response()->json($data, 404);
      //     }
      //     $ingreso->delete();
      //     $data = ['data' => 'Datos eliminados'];
      //     return response()->json($data);
      // }

  }

?>