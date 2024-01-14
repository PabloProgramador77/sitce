<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ciclo;

class CicloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ciclos=array();

        $ciclos=Ciclo::all();

        return view('ciclos.index', ['ciclos'=>$ciclos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ciclos.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ciclo=array();
        $datos=array();

        $request->validate=[
            'nombre'=>'required'
        ];

        $ciclo=new Ciclo;
        $ciclo->nombreCiclo=$request->nombre;
        $ciclo->save();

        if($ciclo->id){
            $datos['exito']=true;
            $datos['mensaje']='Ciclo registrado.';
        }else{
            $datos['exito']=false;
            $datos['mensaje']='Registro incompleto.';
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
        $ciclo=array();

        $ciclo=Ciclo::find($id);

        return view('ciclos.editar', ['ciclo'=>$ciclo]);
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
        $ciclo=array();
        $datos=array();

        $request->validate=[
            'nombre'=>'required',
            'id'=>'required'
        ];

        $ciclo=Ciclo::find($request->id);

        if($ciclo){
            $ciclo->nombreCiclo=$request->nombre;
            $ciclo->save();

            if($ciclo->id){
                $datos['exito']=true;
                $datos['mensaje']='Ciclo actualizado.';
            }else{
                $datos['exito']=false;
                $datos['mensaje']='Actualización incompleta.';
            }
        }else{
            $datos['exito']=false;
            $datos['mensaje']='Actualización no ejecutada.';
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
     * Búsqueda y validacion por nombre
     * @param Request
     * @return json(array)
     */
    public function verificar(Request $request){
        $ciclo=array();
        $datos=array();

        $request->validate=[
            'nombre'=>'required'
        ];

        $ciclo=Ciclo::where('nombreCiclo', '=', $request->nombre)->first();

        if($ciclo){
            if($ciclo->nombreCiclo==$request->nombre){
                $datos['exito']=true;
                $datos['mensaje']='Ciclo duplicado. Intenta con otro.';
            }else{
                $datos['exito']=false;
                $datos['mensaje']='Ciclo permitido';
            }
        }else{
            $datos['exito']=false;
            $datos['mensaje']='Ciclo permitido';
        }

        return response()->json($datos);
    }
}
