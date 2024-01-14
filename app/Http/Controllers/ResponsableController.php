<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use App\Models\Responsable;
use App\Models\Cargo;
use App\Models\Carrera;

class ResponsableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $responsables=array();

        if(session()->get('idInstitucion')){
            $responsables=Responsable::all();

            return view('responsables.index', array('responsables'=>$responsables));
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
        $cargos=array();

        if(session()->get('idInstitucion')){
            $cargos=Cargo::all();

            return view('responsables.nuevo', array('cargos'=>$cargos));
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
        $responsable=array();

        $datos=$request->validate=[
            'nombre'=>'required|min:2',
            'apellido'=>'required|min:2',
            'curp'=>'required',
            'cargo'=>'required',
            'passwordKey'=>'required',
            'archivoCer'=>'required',
            'archivoKey'=>'required'
        ];

        if($datos){
            if($this->verificarArchivos($request)){
                $responsable=New Responsable;

                if($responsable){
                    $responsable->curp=$request->curp;
                    $responsable->nombre=$request->nombre;
                    $responsable->primerApellido=$request->apellido;
                    $responsable->segundoApellido=$request->apellido2;
                    $responsable->idCargo=$request->cargo;
                    $responsable->archivoCer=$request->file('archivoCer')->getClientOriginalName();
                    $responsable->archivoKey=$request->file('archivoKey')->getClientOriginalName();
                    $responsable->passwordKey=Crypt::encrypt($request->passwordKey);
                    $responsable->idInstitucion=session()->get('idInstitucion');
                    $responsable->save();
    
                    if($responsable->id){
                        if(!file_exists(public_path('archivos'))){
                            mkdir(public_path('archivos'), 0777, true);
                        }
    
                        $request->file('archivoCer')->move('archivos', $request->file('archivoCer')->getClientOriginalName());
                        $request->file('archivoKey')->move('archivos', $request->file('archivoKey')->getClientOriginalName());
    
                        if(file_exists('archivos/'.$request->file('archivoCer')->getClientOriginalName()) && file_exists('archivos/'.$request->file('archivoKey')->getClientOriginalName())){
                            
                            if($this->extraerCer($request->file('archivoCer')->getClientOriginalName())){

                                if($this->extraerKey($request->file('archivoKey')->getClientOriginalName(), $request->passwordKey)){
                                    $datos['exito']=true;
                                    $datos['error']='Responsable registrado.';
                                }else{
                                    $datos['exito']=false;
                                    $datos['error']='Error en extracción de datos en archivo KEY.';
                                }
                            }else{
                                $datos['exito']=false;
                                $datos['error']='Error en extracción de datos en archivo CER.';
                            }
                        }else{
                            $datos['exito']=false;
                            $datos['error']='Error al cargar los archivos al disco.';
                        }
                    }else{
                        $datos['exito']=false;
                        $datos['error']='Error durante el registro.';
                    }
                }else{
                    $datos['exito']=false;
                    $datos['error']='Registro interrumpido inesperadamente.';
                }
            }else{
                $datos['exito']=false;
                $datos['error']='Extensión de archivos no compatible.';
            }
        }else{
            $datos['exito']=false;
            $datos['error']='Registro no iniciado.';
        }

        if($datos['exito']){
            return redirect('/responsables/nuevo');
        }else{
            return redirect('/responsables');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $responsable=array();

        if(session()->get('idInstitucion')){
            $responsable=Responsable::find($id);

            return view('responsables.ver', array('responsable'=>$responsable));
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
        $responsable=array();
        $cargos=array();
        $password="";

        if(session()->get('idInstitucion')){
            $responsable=Responsable::find($id);

            $password=Crypt::decrypt($responsable->passwordKey);

            $responsable->passwordKey=$password;

            $cargos=Cargo::all();

            return view('responsables.editar', array('responsable'=>$responsable, 'cargos'=>$cargos));
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
    public function update(Request $request, $id)
    {
        $datos=array();
        $responsable=array();

        $datos=$request->validate=[
            'nombre'=>'required|min:2',
            'apellido'=>'required|min:2',
            'apellido2'=>'required|min:2',
            'curp'=>'required|min:2',
            'cargo'=>'required'
        ];

        if($datos && $id){
            $responsable=Responsable::find($id);

            if($responsable){
                $responsable->curp=$request->curp;
                $responsable->nombre=$request->nombre;
                $responsable->primerApellido=$request->apellido;
                $responsable->segundoApellido=$request->apellido2;
                $responsable->idCargo=$request->cargo;
                $responsable->save();

                if($responsable->id){
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

        if($datos['exito']){
            return redirect('/responsables');
        }else{
            return redirect('/responsables/editar/'.$responsable->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $responsable=array();

        if(session()->get('idInstitucion')){
            $responsable=Responsable::find($id);

            return view('responsables.eliminar', array('responsable'=>$responsable));
        }else{
            session()->flush();

            return view('login');
        }
    }

    /**
     * Búsqueda de CURP
     * @param Request $request->curl_pause
     * @return json
     */
    public function verificarCurp(Request $request){
        $datos=array();
        $responsable=array();

        $datos=$request->validate=[
            'curp'=>'required'
        ];

        if($datos){
            $responsable=Responsable::where('curp', '=', $request->curp)->first();

            if($responsable){

                if($responsable->curp==$request->curp){
                    $datos['exito']=true;
                    $datos['error']='CURP ya registrado.';
                }else{
                    $datos['exito']=false;
                    $datos['error']='CURP permitido.';
                }
            }else{
                $datos['exito']=false;
                $datos['error']='CURP permitido.';
            }
        }else{
            $datos['exito']=false;
            $datos['error']='Verificación de CURP no iniciada.';
        }

        return response()->json($datos);
    }

    /**
     * Verificar el tipo de archivo
     * que sean CER y KEY respectivamente
     * @param Request $request->file()
     * @return boolean
     */
    public function verificarArchivos(Request $request){
        $datos=array();
        
        if($request->file('archivoCer')->getClientOriginalExtension()=="cer"){
            if($request->file('archivoKey')->getClientOriginalExtension()=="key"){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    /**
     * Borrar de la BD
     * @param Request $request->id
     * @return json
     */
    public function borrar(Request $request){
        $datos=array();
        $responsable=array();

        $datos=$request->validate=[
            'id'=>'required'
        ];

        if($datos){
            $responsable=Responsable::find($request->id);

            if($responsable){
                unlink(public_path('archivos/'.$responsable->archivoCer));
                unlink(public_path('archivos/'.$responsable->archivoKey));

                $responsable->delete();

                $datos['exito']=true;
                $datos['error']='Responsable eliminado.';
            }else{
                $datos['exito']=false;
                $datos['error']='Error al eliminar al responsable.';
            }
        }else{
            $datos['exito']=false;
            $datos['error']='Eliminación no iniciada.';
        }

        return response()->json($datos);
    }

    /**
     * Búsqueda de datos de las claves y retorno
     * @param $id
     * @return array()
     */
    public function mostrarClaves($id){
        $responsable=array();

        if(session()->get('idInstitucion')){
            $responsable=Responsable::find($id);

            $password=Crypt::decrypt($responsable->passwordKey);

            $responsable->passwordKey=$password;

            return view('responsables.claves', array('responsable'=>$responsable));
        }else{
            session()->flush();

            return view('login');
        }
    }

    /**
     * Actualización de los archivos CER y KEY
     * @param Request $request
     * @return redirect
     */
    public function actualizar(Request $request, $id){
        $datos=array();
        $responsable=array();

        $datos=$request->validate=[
            'archivoCer'=>'required',
            'archivoKey'=>'required',
            'passwordKey'=>'required'
        ];

        if($datos){
            $responsable=Responsable::find($id);

            if($responsable){
                if(file_exists(($request->file('archivoCer')))){
                    unlink(public_path('archivos/'.$responsable->archivoCer));
                    $request->file('archivoCer')->move('archivos', $request->file('archivoCer')->getClientOriginalName());
                    $responsable->archivoCer=$request->file('archivoCer')->getClientOriginalName();
                }

                if(file_exists($request->file('archivoKey'))){
                    unlink(public_path('archivos/'.$responsable->archivoKey));
                    $request->file('archivoKey')->move('archivos', $request->file('archivoKey')->getClientOriginalName());
                    $responsable->archivoKey=$request->file('archivoKey')->getClientOriginalName();
                }

                $responsable->passwordKey=Crypt::encrypt($request->passwordKey);
                $responsable->save();

                if($responsable->id){
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

        if($datos['exito']){
            return redirect('/responsables');
        }else{
            return redirect('/responsables/claves/'.$id);
        }
    }

    /**
     * Validación inicial de carreras
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
                $datos['error']='Configuración establecida.';
            }else{
                $datos['exito']=false;
                $datos['error']='No hay registro de carreras. Por favor, haz el registro.';
            }
        }else{
            session()->flush();

            return view('login');
        }

        return response()->json($datos);
    }

    /**
     * Desencriptar CER
     * @param Request file
     * @return bool
     */
    public function extraerCer($archivoCer){
        shell_exec(public_path('openssl-1.0.2p/bin/openssl x509 -inform DER -in '.public_path('archivos/'.$archivoCer.' -outform PEM -out '.public_path('archivos/'.$archivoCer.'.pem'))));

        if(file_exists(public_path('archivos/'.$archivoCer.'.pem'))){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Desencriptar KEY
     * @param Request file
     * @return bool
     */
    public function extraerKey($archivoKey, $pass){
        shell_exec(public_path('openssl-1.0.2p/bin/openssl pkcs8 -inform DER -in '.public_path('archivos/'.$archivoKey.' -outform PEM -out '.public_path('archivos/'.$archivoKey.'.pem -passin pass:'.$pass))));

        if(file_exists(public_path('archivos/'.$archivoKey.'.pem'))){
            return true;
        }else{
            return false;
        }

    }
}
