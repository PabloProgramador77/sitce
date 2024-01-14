<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\Institucion;
use App\Models\Entidades;

class InstitucionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session()->get('idInstitucion')){
            
            return view('contenido');
            
        }else{

            session()->forget('planInstitucion');
            session()->forget('nombreInstitucion');
            session()->forget('idInstitucion');
            
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
        $entidades=array();

        $entidades=Entidades::all();

        return view('registro', array('entidades'=>$entidades));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $institucion=array();

        if(session()->get('idInstitucion')){
            $institucion=Institucion::find(session()->get('idInstitucion'));
        }else{
            session()->forget('planInstitucion');
            session()->forget('nombreInstitucion');
            session()->forget('idInstitucion');

            return view('login');
        }

        return view('institucion.index', array('institucion'=>$institucion));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $institucion=array();
        $entidades=array();

        if(session()->get('idInstitucion')){
            $institucion=Institucion::find(session()->get('idInstitucion'));
            $entidades=Entidades::all();
        }else{
            session()->forget('planInstitucion');
            session()->forget('nombreInstitucion');
            session()->forget('idInstitucion');

            return view('login');
        }

        return view('institucion.editar', array('institucion'=>$institucion, 'entidades'=>$entidades));
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
        $institucion=array();

        $datos=$request->validate=[
            'nombre'=>'required|min:2',
            'campus'=>'required|min:2',
            'idInstitucion'=>'required',
            'idCampus'=>'required',
            'idEntidadFederativa'=>'required'
        ];

        if($datos){
            $institucion=Institucion::find(session()->get('idInstitucion'));

            if($institucion){
                $institucion->nombreInstitucion=$request->nombre;
                $institucion->campus=$request->campus;
                $institucion->idCampus=$request->idCampus;
                $institucion->idInstitucion=$request->idInstitucion;
                $institucion->idEntidadFederativa=$request->idEntidadFederativa;
                $institucion->save();
            
                if($institucion->id){
                    $datos['exito']=true;
                    $datos['error']='IPES actualizada.';
                }else{
                    $datos['exito']=false;
                    $datos['error']='Error de actualización.';
                }
            }else{
                $datos['exito']=false;
                $datos['error']='Actualización interrumpida.';
            }
        }else{
            $datos['exito']=false;
            $datos['error']='Actualización no iniciada.';
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
     * Registrar IPES
     * @param Request $request
     * @return json
     */
    public function registrar(Request $request){
        $datos=array();
        $institucion=array();

        $datos=$request->validate=[
            'nombre'=>'required|min:2',
            'idInstitucion'=>'required',
            'entidad'=>'required',
            'email'=>'required',
            'password'=>'required',
            'terminos'=>'required'
        ];

        if($datos){
            $institucion=New Institucion;
            $institucion->idInstitucion=$request->idInstitucion;
            $institucion->nombreInstitucion=$request->nombre;
            $institucion->idCampus='000000';
            $institucion->campus='Campus Indefinido';
            $institucion->idEntidadFederativa=$request->entidad;
            $institucion->email=$request->email;
            $institucion->password=Crypt::encrypt($request->password);
            $institucion->avatarInstitucion='Logo Indefinido';
            $institucion->tipoAvatarInstitucion='Tipo Indefinido';
            $institucion->estatusInstitucion='Activo';
            $institucion->planInstitucion='Basico';
            $institucion->save();

            if($institucion->id){
                $datos['exito']=true;
                $datos['error']='IPES registrada.';
            }else{
                $datos['exito']=false;
                $datos['error']='Error al registrar la IPES.';
            }
        }else{
            $datos['exito']=false;
            $datos['error']='Registro de IPES no ejecutado.';
        }

        return response()->json($datos);
    }

    /**
     * Verificación de ID Institucion
     * @param Request $request->id
     * @return JSON
     */
    public function verificarId(Request $request){
        $datos=array();
        $institucion=array();

        $datos=$request->validate=[
            'idInstitucion'=>'required'
        ];

        if($datos){
            $institucion=Institucion::where('idInstitucion', '=', $request->idInstitucion)->first();

            if($institucion){
                if($request->idInstitucion==$institucion->idInstitucion){
                    $datos['exito']=true;
                    $datos['error']='ID ya registrado. Intenta con otro.';
                }else{
                    $datos['exito']=false;
                    $datos['error']='ID permitido';
                }
            }else{
                $datos['exito']=false;
                $datos['error']='ID permitido.';
            }
        }else{
            $datos['exito']=false;
            $datos['error']='Error en la búsqueda de ID.';
        }

        return response()->json($datos);
    }

    /**
     * Verificación de Email
     * @param Request $request->exif_thumbnail
     * @return JSON
     */
    public function verificarEmail(Request $request){
        $datos=array();
        $institucion=array();
        $password="";

        $datos=$request->validate=[
            'email'=>'required'
        ];

        if($datos){
            $institucion=Institucion::where('email', '=', $request->email)->first();

            if($institucion){
                if($request->email==$institucion->email){
                    $datos['exito']=true;
                    $datos['error']='EMAIL ya registrado. Intenta con otro.';
                }else{
                    $datos['exito']=false;
                    $datos['error']='EMAIL permitido';
                }
            }else{
                $datos['exito']=false;
                $datos['error']='EMAIL permitido';
            }
        }else{
            $datos['exito']=false;
            $datos['error']='Error en la búsqueda de datos.';
        }

        return response()->json($datos);
    }

    /**
     * Inicio de sesión
     * @param Request $request->email & $request->password_get_info
     * @return JSON
     */
    public function login(Request $request){
        $datos=array();
        $institucion=array();
        $password="";

        $datos=$request->validate=[
            'email'=>'required',
            'password'=>'required'
        ];

        if($datos){
            $institucion=Institucion::where('email', '=', $request->email)->first();

            if($institucion){
                $password=Crypt::decrypt($institucion->password);
                if($request->password==$password){
                    $datos['exito']=true;
                    session()->put('idInstitucion', $institucion->id);
                    session()->put('nombreInstitucion', $institucion->nombreInstitucion);
                    session()->put('planInstitucion', $institucion->planInstitucion);
                }else{
                    $datos['exito']=false;
                    $datos['error']='Contraseña incorrecta. Intenta de nuevo.';
                }
            }else{
                $datos['exito']=false;
                $datos['error']='Verificación de acceso interrumpida.';
            }
        }else{
            $datos['exito']=false;
            $datos['error']='Validación de acceso no iniciada.';
        }

        return response()->json($datos);
    }

    /**
     * Destruir session y cerrar sesión
     * @param session()->get('idInstitucion')
     * @return view
     */
    public function logout(){
        if(session()->get('idInstitucion')){
            
            session()->forget('idInstitucion');
            session()->forget('nombreInstitucion');
            session()->forget('planInstitucion');

            return view('/login');
        }
    }

    /**
     * Búsqueda y muestra de datos de LOGIN
     * @param Request session()
     * @return array()
     */
    public function acceso(){
        $institucion=array();
        $password="";

        if(session()->get('idInstitucion')){
            $institucion=Institucion::find(session()->get('idInstitucion'));
            $password=Crypt::decrypt($institucion->password);
            $institucion->password=$password;
        }else{
            session()->forget('planInstitucion');
            session()->forget('nombreInstitucion');
            session()->forget('idInstitucion');

            return view('login');
        }

        return view('institucion/acceso', array('institucion'=>$institucion));
    }

    /**
     * Búsqueda de RVOE para verificar
     * @param Request $request->rvoe
     * @return JSON
     */
    public function verificarCampus(Request $request){
        $datos=array();
        $institucion=array();

        $datos=$request->validate=[
            'idCampus'=>'required'
        ];

        if($datos){
            $institucion=Institucion::where('idCampus', '=', $request->idCampus)->first();

            if($institucion){
                
                if($request->idCampus==$institucion->idCampus){
                    $datos['exito']=true;
                    $datos['error']='ID Campus ya registrado. Intenta con otro.';
                }else{
                    $datos['exito']=false;
                    $datos['error']='ID Campus permitido.';
                }
            }else{
                $datos['exito']=false;
                $datos['error']='ID Campus permitido.';
            }
        }else{
            $datos['exito']=false;
            $datos['error']='Verificación de ID Campus no iniciada.';
        }

        return response()->json($datos);
    }

    /**
     * Actualización de los datos de LOGIN
     * @param Request $request->email & $request->password
     * @return JSON
     */
    public function actualizarAcceso(Request $request){
        $datos=array();
        $institucion=array();

        $datos=$request->validate=[
            'email'=>'required',
            'password'=>'required'
        ];

        if($datos){
            $institucion=Institucion::find(session()->get('idInstitucion'));

            if($institucion){
                $institucion->email=$request->email;
                $institucion->password=Crypt::encrypt($request->password);
                $institucion->save();

                if($institucion->id){
                    $datos['exito']=true;
                    $datos['error']='Credencial de acceso actualizada.';
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
            $datos['error']='No fue posible iniciar la actualización.';
        }

        return response()->json($datos);
    }

    /**
     * Búsqueda de datos de imagen de perfil
     * @param session()
     * @return array()
     */
    public function avatar(){
        $institucion=array();

        if(session()->get('idInstitucion')){
            $institucion=Institucion::find(session()->get('idInstitucion'));
        }else{
            session()->forget('planInstitucion');
            session()->forget('nombreInstitucion');
            session()->forget('idInstitucion');

            return view('login');
        }

        return view('institucion.avatar', array('institucion'=>$institucion));
    }

    /**
     * Actualizar y subir imagen de institucion
     * @param Request $request->file
     * @return json
     */
    public function actualizarAvatar(Request $request){
        $datos=array();
        $institucion=array();

        $datos=$request->validate=[
            'avatar'=>'required'
        ];

        if($datos){
            $institucion=Institucion::find(session()->get('idInstitucion'));

            if($institucion){
                $institucion->avatarInstitucion=$request->file('avatar')->getClientOriginalName();
                $institucion->tipoAvatarInstitucion=$request->file('avatar')->getClientOriginalExtension();
                $institucion->save();

                if($institucion->id){
                    if(!file_exists(public_path('img/avatars'))){
                        mkdir(public_path('img/avatars'), 0777, true);
                    }

                    $request->file('avatar')->move('img/avatars', $institucion->avatarInstitucion);

                    if(file_exists('img/avatars/'.$institucion->avatarInstitucion)){
                        $datos['exito']=true;
                    }else{
                        $datos['exito']=false;
                    }
                }else{
                    $datos['exito']=false;
                }
            }else{
                $datos['exito']=false;
            }
        }else{
            $datos['exito']=false;
        }

        if($datos['exito']){
            return redirect('/perfil');
        }else{
            return redirect('/institucion/avatar');
        }
    }

    /**
     * Crear nueva contraseña y envial por email
     * @param Request
     * @return json(array)
     */
    public function recuperar(Request $request){
        $institucion=array();
        $datos=array();

        $request->validate=[
            'email'=>'required'
        ];

        $institucion=Institucion::where('email', '=', $request->email)->first();

        if($institucion){
            $institucion->password=Crypt::encrypt($this->crearPassword());
            $institucion->save();

            if($institucion->id){
                $datos['exito']=true;
                $datos['mensaje']='Nueva contraseña creada correctamente.';
            }else{
                $datos['exito']=false;
                $datos['mensaje']='Hubo un inconveniente al crear la contraseña.';
            }
        }else{
            $datos['exito']=false;
            $datos['mensaje']='Recuperación no ejecutada.';
        }

        return response()->json($datos);
    }

    /**Generación de nueva contraseña
     * @param Request
     * @return string
     */
    public function crearPassword(){
        $pass='';

        $pass=openssl_random_pseudo_bytes(4);
        $pass=bin2hex($pass);

        return $pass;
    }

    public function plan(){
        $institucion=array();

        if(session()->get('idInstitucion')){

            $institucion=Institucion::where('id', '=', session()->get('idInstitucion'))->first();

            return view('institucion.plan', ['institucion'=>$institucion]);

        }else{

            session()->forget('planInstitucion');
            session()->forget('nombreInstitucion');
            session()->forget('idInstitucion');

            return view('login');

        }
    }
}