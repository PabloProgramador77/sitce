<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expediciones;
use App\Models\Alumno;
use App\Models\TipoCertificacion;

class ExpedicionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expediciones=array();

        if(session()->get('idInstitucion')){
            $expediciones=Expediciones::all();

            if(!empty($expediciones)){
                return view('expediciones.index', array('expediciones'=>$expediciones));
            }
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
        $alumnos=array();
        $certificaciones=array();

        if(session()->get('idInstitucion')){
            $alumnos=Alumno::all();
            $certificaciones=TipoCertificacion::all();

            return view('expediciones.nuevo', array('alumnos'=>$alumnos, 'certificaciones'=>$certificaciones));
        }else{
            session()->flush();

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
        $expedicion=array();
        $datos=array();

        $datos=$request->validate=[
            'folio'=>'required',
            'certificacion'=>'required',
            'alumno'=>'required'
        ];

        if(!empty($datos)){
            $expedicion=new Expediciones;
            $expedicion->folio=$request->folio;
            $expedicion->idTipoCertificacion=$request->certificacion;
            $expedicion->idAlumno=$request->alumno;
            $expedicion->idLugarExpedicion=session()->get('idInstitucion');
            $expedicion->save();

            if($expedicion->id){
                $datos['exito']=true;
                $datos['mensaje']='EXPEDICIÓN registrada.';
            }else{
                $datos['exito']=false;
                $datos['mensaje']='Registro de expedición incompleto.';
            }
        }else{
            $datos['exito']=false;
            $datos['mensaje']='Registro no ejecutado por falta de datos.';
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
        $expedicion=array();

        if(session()->get('idInstitucion')){
            $expedicion=Expediciones::find($id);

            return view('expediciones.ver', array('expedicion'=>$expedicion));
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
        $expedicion=array();
        $certificaciones=array();
        $alumno=array();

        $expedicion=Expediciones::find($id);
        $certificaciones=TipoCertificacion::all();
        $alumnos=Alumno::all();

        return view('expediciones.editar', array('certificaciones'=>$certificaciones, 'expedicion'=>$expedicion, 'alumnos'=>$alumnos));
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
        $expedicion=array();
        $datos=array();

        $request->validate=[
            'folio'=>'required',
            'certificacion'=>'required',
            'alumno'=>'required',
            'id'=>'required'
        ];

        $expedicion=Expediciones::find($request->id);

        if(!empty($expedicion)){
            $expedicion->folio=$request->folio;
            $expedicion->idTipoCertificacion=$request->certificacion;
            $expedicion->idAlumno=$request->alumno;
            $expedicion->save();

            if($expedicion->id){
                $datos['exito']=true;
                $datos['mensaje']='EXPEDICIÓN actualizada.';
            }else{
                $datos['exito']=false;
                $datos['mensaje']='Actualización incompleta.';
            }
        }else{
            $datos['exito']=false;
            $datos['mensaje']='Actualización no ejecutada por falta de datos.';
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

    /**
     * Verificación de folio
     * @param Request
     * @return json
     */
    public function verificarFolio(Request $request){
        $expedicion=array();
        $datos=array();

        $request->validate=[
            'folio'=>'required'
        ];

        $expedicion=Expediciones::where('folio', '=', $request->folio)->first();

        if($expedicion){
            if($expedicion->folio==$request->folio){
                $datos['exito']=true;
                $datos['mensaje']='FOLIO ya registrado.';
            }else{
                $datos['exito']=false;
                $datos['mensaje']='FOLIO permitido.';
            }
        }else{
            $datos['exito']=false;
            $datos['mensaje']='FOLIO permitido.';
        }

        return response()->json($datos);
    }

    /**
     * Verificación de alumno
     * @param Request
     * @return json
     */
    public function verificarAlumno(Request $request){
        $expedicion=array();
        $datos=array();

        $request->validate=[
            'alumno'=>'required'
        ];

        $expedicion=Expediciones::where('idAlumno', '=', $request->alumno)->first();

        if($expedicion){
            if($expedicion->idAlumno==$request->alumno){
                $datos['exito']=true;
                $datos['mensaje']='ALUMNO ya expedido.';
            }else{
                $datos['exito']=false;
                $datos['mensaje']='ALUMNO autorizado.';
            }
        }else{
            $datos['exito']=false;
            $datos['mensaje']='ALUMNO autorizado.';
        }

        return response()->json($datos);
    }
}
