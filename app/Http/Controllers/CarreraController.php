<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrera;
use App\Models\Periodo;
use App\Models\NivelEstudio;

class CarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carreras=array();
        $periodos=array();
        $nivelEstudios=array();

        if(session()->get('idInstitucion')){
            $carreras=Carrera::all();
        }else{
            sesion()->flush();

            return view('login');
        }

        return view('carreras.index', array('carreras'=>$carreras));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carreras=array();
        $periodos=array();
        $nivelEstudios=array();

        if(session()->get('idInstitucion')){
            $carreras=Carrera::all();
            $periodos=Periodo::all();
            $nivelEstudios=NivelEstudio::all();
            return view('carreras.nuevo', array('carreras'=>$carreras, 'periodos'=>$periodos, 'nivelEstudios'=>$nivelEstudios));
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
        $datos=array();
        $carrera=array();

        $datos=$request->validate=[
            'idCarrera'=>'required',
            'clavePlan'=>'required',
            'periodo'=>'required',
            'nivel'=>'required',
            'rvoe'=>'required',
            'fechaRvoe'=>'required',
            'calificacionMinima'=>'required',
            'calificacionMaxima'=>'required',
            'calificacionAprobatoria'=>'required'
        ];

        if($datos){
            $carrera=New Carrera;

            if($carrera){
                $carrera->idCarrera=$request->idCarrera;
                $carrera->nombreCarrera=$request->nombre;
                $carrera->claveCarrera=$request->clave;
                $carrera->idTipoPeriodo=$request->periodo;
                $carrera->clavePlan=$request->clavePlan;
                $carrera->idNivelEstudios=$request->nivel;
                $carrera->rvoe=$request->rvoe;
                $carrera->fechaExpedicionRvoe=$request->fechaRvoe;
                $carrera->calificacionMinima=$request->calificacionMinima;
                $carrera->calificacionMaxima=$request->calificacionMaxima;
                $carrera->calificacionMinimaAprobatoria=$request->calificacionAprobatoria;
                $carrera->idInstitucion=session()->get('idInstitucion');
                $carrera->save();

                if($carrera->id){
                    $datos['exito']=true;
                    $datos['error']='Carrera registrada.';
                }else{
                    $datos['exito']=false;
                    $datos['error']='Error al durante el registro.';
                }
            }else{
                $datos['exito']=false;
                $datos['error']='Registro interrumpido inesperadamente.';
            }
        }else{
            $datos['exito']=false;
            $datos['error']='Registro no iniciado.';
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
        $carrera=array();

        if(session()->get('idInstitucion')){
            $carrera=Carrera::find($id);

            return view('carreras.ver', array('carrera'=>$carrera));
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
        $carrera=array();
        $periodos=array();
        $nivelEstudios=array();

        if(session()->get('idInstitucion')){
            $carrera=Carrera::find($id);
            $periodos=Periodo::all();
            $nivelEstudios=NivelEstudio::all();

            return view('carreras.editar', array('carrera'=>$carrera, 'periodos'=>$periodos, 'nivelEstudios'=>$nivelEstudios));
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
        $carrera=array();

        $datos=$request->validate=[
            'id'=>'required',
            'idCarrera'=>'required',
            'clavePlan'=>'required',
            'periodo'=>'required',
            'nivel'=>'required',
            'rvoe'=>'required',
            'fechaRvoe'=>'required',
            'calificacionMinima'=>'required',
            'calificacionMaxima'=>'required',
            'calificacionAprobatoria'=>'required'
        ];

        if($datos){
            $carrera=Carrera::find($request->id);

            if($carrera){
                $carrera->idCarrera=$request->idCarrera;
                $carrera->nombreCarrera=$request->nombre;
                $carrera->claveCarrera=$request->clave;
                $carrera->idTipoPeriodo=$request->periodo;
                $carrera->clavePlan=$request->clavePlan;
                $carrera->idNivelEstudios=$request->nivel;
                $carrera->rvoe=$request->rvoe;
                $carrera->fechaExpedicionRvoe=$request->fechaRvoe;
                $carrera->calificacionMinima=$request->calificacionMinima;
                $carrera->calificacionMaxima=$request->calificacionMaxima;
                $carrera->calificacionMinimaAprobatoria=$request->calificacionAprobatoria;
                $carrera->save();

                if($carrera->id){
                    $datos['exito']=true;
                    $datos['error']='Carrera actualizada.';
                }else{
                    $datos['exito']=false;
                    $datos['error']='Error de actualización.';
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
        $carrera=array();

        if(session()->get('idInstitucion')){
            $carrera=Carrera::find($id);

            return view('carreras.eliminar', array('carrera'=>$carrera));
        }else{
            session()->flush();

            return view('login');
        }
    }

    /**
     * Borrado de la base de datos
     * @param Request $request->id
     * @return JSON
     */
    public function borrar(Request $request){
        $datos=array();
        $carrera=array();

        $datos=$request->validate=[
            'id'=>'required'
        ];

        if($datos){
            $carrera=Carrera::find($request->id);

            if($carrera){
                $carrera->delete();

                $datos['exito']=true;
                $datos['error']='Carrera eliminada.';
            }else{
                $datos['exito']=false;
                $datos['error']='Error al intentar eliminar la carrera.';
            }
        }else{
            $datos['exito']=false;
            $datos['error']='Eliminación no ejecutada.';
        }

        return response()->json($datos);
    }

    /**
     * Búsqueda de ID de carrera
     * @param Request $request->id
     * @return JSON(array)
     */
    public function verificarId(Request $request){
        $datos=array();
        $carrera=array();

        $datos=$request->validate=[
            'idCarrera'=>'required'
        ];

        if($datos){
            $carrera=Carrera::where('idCarrera', '=', $request->idCarrera)->first();

            if($carrera){
                if($carrera->idCarrera==$request->idCarrera){
                    $datos['exito']=true;
                    $datos['error']='ID de carrera ya registrado.';
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
     * Búsqueda de clave de carrera
     * @param Request $request->id
     * @return JSON(array)
     */
    public function verificarClave(Request $request){
        $datos=array();
        $carrera=array();

        $datos=$request->validate=[
            'clave'=>'required'
        ];

        if($datos){
            $carrera=Carrera::where('claveCarrera', '=', $request->clave)->first();

            if($carrera){
                if($carrera->claveCarrera==$request->clave){
                    $datos['exito']=true;
                    $datos['error']='CLAVE de carrera ya registrada.';
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
     * Verificación de RVOE
     * @param Request $request->shm_remove_var
     * @return json
     */
    public function verificarRvoe(Request $request){
        $datos=array();
        $carrera=array();

        $datos=$request->validate=[
            'rvoe'=>'required'
        ];

        if($datos){
            $carrera=Carrera::where('rvoe', '=', $request->rvoe)->first();

            if($carrera){
                if($carrera->rvoe==$request->rvoe){
                    $datos['exito']=true;
                    $datos['error']='RVOE ya registrado.';
                }else{
                    $datos['exito']=false;
                    $datos['error']='RVOE permitido.';
                }
            }else{
                $datos['exito']=false;
                $datos['error']='RVOE permitido.';
            }
        }else{
            $datos['exito']=true;
            $datos['error']='Validación de RVOE no ejecutada.';
        }

        return response()->json($datos);
    }
}
