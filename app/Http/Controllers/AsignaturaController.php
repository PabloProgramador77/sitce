<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asignatura;
use App\Models\TipoAsignatura;
use App\Models\Carrera;
use App\Models\Alumno;
use App\Models\Calificaciones;

class AsignaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asignaturas=array();

        if(session()->get('idInstitucion')){
            $asignaturas=Asignatura::all();

            return view('asignaturas.index', array('asignaturas'=>$asignaturas));
        }else{
            session()->flush();

            return view('login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoAsignatura=array();
        $carreras=array();

        if(session()->get('idInstitucion')){
            $tipoAsignatura=TipoAsignatura::all();
            $carreras=Carrera::all();

            return view('asignaturas.nuevo', array('tipoAsignatura'=>$tipoAsignatura, 'carreras'=>$carreras));
        }else{
            return view('login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos=array();
        $asignatura=array();

        $datos=$request->validate=[
            'idAsignatura'=>'required',
            'ciclo'=>'required',
            'creditos'=>'required',
            'tipoAsignatura'=>'required',
            'carrera'=>'required'
        ];

        if($datos){
            $asignatura=New Asignatura;

            if($asignatura){
                $asignatura->idAsignatura=$request->idAsignatura;
                $asignatura->claveAsignatura=$request->clave;
                $asignatura->nombreAsignatura=$request->nombre;
                $asignatura->idTipoAsignatura=$request->tipoAsignatura;
                $asignatura->creditos=$request->creditos;
                $asignatura->idInstitucion=session()->get('idInstitucion');
                $asignatura->idCarrera=$request->carrera;
                $asignatura->save();

                if($asignatura->id){
                    $this->inscribir($asignatura->id);

                    $datos['exito']=true;
                    $datos['error']='Asignatura registrada';
                }else{
                    $datos['exito']=false;
                    $datos['error']='Error de registro.';
                }
            }else{
                $datos['exito']=false;
                $datos['error']='Registro interrumpido inesperadamente.';
            }
        }else{
            $datos['exito']=false;
            $datos['error']='Registro de asignatura no ejecutado.';
        }

        return response()->json($datos);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asignatura=array();

        if(session()->get('idInstitucion')){
            $asignatura=Asignatura::find($id);

            return view('asignaturas.ver', array('asignatura'=>$asignatura));
        }else{
            session()->flush();

            return view('login');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $asignatura=array();
        $tipoAsignatura=array();
        $carreras=array();

        if(session()->get('idInstitucion')){
            $asignatura=Asignatura::find($id);
            $tipoAsignatura=TipoAsignatura::all();
            $carreras=Carrera::all();

            return view('asignaturas.editar', array('asignatura'=>$asignatura, 'tipoAsignatura'=>$tipoAsignatura, 'carreras'=>$carreras));
        }else{
            session()->flush();

            return view('login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $datos=array();
        $asignatura=array();

        $datos=$request->validate=[
            'idAsignatura'=>'required',
            'ciclo'=>'required',
            'creditos'=>'required',
            'tipoAsignatura'=>'required',
            'id'=>'required',
            'carrera'=>'required'
        ];

        if($datos){
            $asignatura=Asignatura::find($request->id);

            if($asignatura){
                $asignatura->idAsignatura=$request->idAsignatura;
                $asignatura->claveAsignatura=$request->clave;
                $asignatura->nombreAsignatura=$request->nombre;
                //$asignatura->ciclo=$request->ciclo;
                $asignatura->idTipoAsignatura=$request->tipoAsignatura;
                $asignatura->creditos=$request->creditos;
                $asignatura->idCarrera=$request->carrera;
                $asignatura->save();

                if($asignatura->id){
                    $datos['exito']=true;
                    $datos['error']='Asignatura actualizada.';
                }else{
                    $datos['exito']=false;
                    $datos['error']='Actualización erronea.';
                }
            }else{
                $datos['exito']=false;
                $datos['error']='Actualización interrumpida inesperadamente.';
            }
        }else{
            $datos['exito']=false;
            $datos['error']='Actualización no ejecutada.';
        }

        return response()->json($datos);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $asignatura=array();

        if(session()->get('idInstitucion')){
            $asignatura=Asignatura::find($id);

            return view('asignaturas.eliminar', array('asignatura'=>$asignatura));
        }else{
            session()->flush();

            return view('login');
        }
    }

    /**
     * Búsqueda de ID de asignatura
     * @param Request $request->id
     * @return json(array)
     */
    public function verificarId(Request $request){
        $datos=array();
        $asignatura=array();

        $datos=$request->validate=[
            'idAsignatura'=>'required'
        ];

        if($datos){
            $asignatura=Asignatura::where('idAsignatura', '=', $request->idAsignatura)->first();

            if($asignatura){
                if($asignatura->idAsignatura==$request->idAsignatura){
                    $datos['exito']=true;
                    $datos['error']='ID de asignatura ya registrado.';
                }else{
                    $datos['exito']=false;
                    $datos['error']='ID permitido';
                }
            }else{
                $datos['exito']=false;
                $datos['error']='ID permitido.';
            }
        }

        return response()->json($datos);
    }

    /**
     * Búsqueda de CLAVE de asignatura
     * @param Request $request->clave
     * @return json(array)
     */
    public function verificarClave(Request $request){
        $datos=array();
        $asignatura=array();

        $datos=$request->validate=[
            'clave'=>'required'
        ];

        if($datos){
            $asignatura=Asignatura::where('claveAsignatura', '=', $request->clave)->first();

            if($asignatura){
                if($asignatura->claveAsignatura==$request->clave){
                    $datos['exito']=true;
                    $datos['error']='CLAVE de asignatura ya registrada.';
                }else{
                    $datos['exito']=false;
                    $datos['error']='CLAVE permitida.';
                }
            }else{
                $datos['exito']=false;
                $datos['error']='CLAVE permitida.';
            }
        }

        return response()->json($datos);
    }

    /**
     * Borrar de la BD
     * @param Request $request->id
     * @return json
     */
    public function borrar(Request $request){
        $datos=array();
        $asignatura=array();

        $datos=$request->validate=[
            'id'=>'required'
        ];

        if($datos){
            $asignatura=Asignatura::find($request->id)->first();

            if($asignatura){
                $asignatura->delete();

                $datos['exito']=true;
                $datos['error']='Asignatura eliminada.';
            }else{
                $datos['exito']=false;
                $datos['error']='Error de eliminación.';
            }
        }else{
            $datos['exito']=false;
            $datos['error']='Eliminación no ejecutada.';
        }

        return response()->json($datos);
    }

    /**
     * Inicializando la validación de carreras
     * @param null
     * @return json
     */
    public function init(){
        $carreras=array();
        $datos=array();

        if(session()->get('idInstitucion')){
            $carreras=Carrera::all();

            if(sizeof($carreras)>0){
                $datos['exito']=true;
                $datos['error']='Configuración cargada.';
            }else{
                $datos['exito']=false;
                $datos['error']='No has registrado carreras. Por favor, haz el registro.';
            }
        }else{
            session()->flush();

            return view('login');
        }

        return response()->json($datos);
    }

    public function inscribir($id){
        $alumnos=array();
        $calificaciones=array();

        $alumnos=Alumno::select('alumnos.id')
        ->join('asignaturas', 'alumnos.idCarrera', '=', 'asignaturas.idCarrera')
        ->where('asignaturas.id', '=', $id)
        ->get();

        if($alumnos){
            foreach ($alumnos as $alumno) {
                $calificaciones=New Calificaciones;
                $calificaciones->idAsignatura=$id;
                $calificaciones->idAlumno=$alumno->id;
                $calificaciones->idObservacion=100;
                $calificaciones->idCiclo=1;
                $calificaciones->calificacion='0';
                $calificaciones->estatusCalificacion='No aprobada';
                $calificaciones->save();   
            }
        }
    }
}
