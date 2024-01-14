<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calificaciones;
use App\Models\Alumno;
use App\Models\Observaciones;
use App\Models\Asignatura;
use App\Models\Ciclo;

class CalificacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $idAlumno, $idAsignatura)
    {
        $calificaciones=array();
        $datos=array();
        $ciclos=array();

        $datos=$request->validate=[
            'calificacion'=>'required',
            'observaciones'=>'required',
            'estatus'=>'required',
            'ciclo'=>'required'
        ];

        if($datos){
            $calificaciones=Calificaciones::where('idAlumno', '=', $idAlumno)
            ->where('idAsignatura', '=', $idAsignatura)
            ->first();

            if($calificaciones){
                $calificaciones->calificacion=$request->calificacion;
                $calificaciones->idObservacion=$request->observaciones;
                $calificaciones->idCiclo=$request->ciclo;
                $calificaciones->estatusCalificacion=$request->estatus;
                $calificaciones->save();
            }
        }

        $alumno=Alumno::find($idAlumno);
        
        $observaciones=Observaciones::all();

        $ciclos=Ciclo::all();

        $asignaturas=Asignatura::select('asignaturas.id', 'asignaturas.nombreAsignatura')
        ->join('calificaciones', 'asignaturas.id', '=', 'calificaciones.idAsignatura')
        ->where('calificaciones.idAlumno', '=', $idAlumno)
        ->where('calificaciones.calificacion', '=', '0')->get();

        return view('alumnos.calificaciones', array('alumno'=>$alumno, 'observaciones'=>$observaciones, 'asignaturas'=>$asignaturas, 'ciclos'=>$ciclos));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        $calificaciones=array();
        $alumno=array();
        $observaciones=array();

        $alumno=Alumno::select('*')
        ->join('calificaciones', 'alumnos.id', '=', 'calificaciones.idAlumno')
        ->where('calificaciones.id', '=', $id)
        ->first();

        $calificaciones=Calificaciones::find($id);

        $observaciones=Observaciones::all();

        return view('calificaciones.editar', array('alumno'=>$alumno, 'calificaciones'=>$calificaciones, 'observaciones'=>$observaciones));
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
        $calificaciones=array();
        $datos=array();

        $datos=$request->validate=[
            'id'=>'required',
            'calificacion'=>'required',
            'observacion'=>'required',
            'estatus'=>'required',
            '_token'=>'required'
        ];

        if($datos){
            $calificaciones=Calificaciones::find($request->id);

            if($calificaciones){
                $calificaciones->idObservacion=$request->observacion;
                $calificaciones->calificacion=$request->calificacion;
                $calificaciones->estatusCalificacion=$request->estatus;
                $calificaciones->save();

                if($calificaciones->id){
                    $datos['exito']=true;
                    $datos['error']='Calificación actualizada.';
                }else{
                    $datos['exito']=false;
                    $datos['error']='Actualización no completada.';
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
        //
    }
}
