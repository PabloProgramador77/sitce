<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Genero;
use App\Models\Carrera;
use App\Models\Asignatura;
use App\Models\Calificaciones;
use App\Models\Observaciones;
use App\Models\Ciclo;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos=array();

        if(session()->get('idInstitucion')){
            $alumnos=Alumno::all();

            return view('alumnos.index', array('alumnos'=>$alumnos));
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
        $generos=array();
        $carreras=array();

        if(session()->get('idInstitucion')){
            $generos=Genero::all();
            $carreras=Carrera::all();

            return view('alumnos.nuevo', array('generos'=>$generos, 'carreras'=>$carreras));
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
        $alumno=array();

        $request->validate=[
            'numeroControl'=>'required',
            'curp'=>'required|min:18|max:18',
            'nombre'=>'required|min:2',
            'primerApellido'=>'required|min:2',
            'genero'=>'required',
            'fechaNacimiento'=>'required',
            'carrera'=>'required'
        ];

        $alumno=New Alumno;
        $alumno->numeroControl=$request->numeroControl;
        $alumno->curp=$request->curp;
        $alumno->nombre=$request->nombre;
        $alumno->primerApellido=$request->primerApellido;
        $alumno->segundoApellido=$request->segundoApellido;
        $alumno->idGenero=$request->genero;
        $alumno->fechaNacimiento=$request->fechaNacimiento;
        //$alumno->fotografia='avatarAlumno.png';
        //$alumno->firmaAutografa="Desconocida";
        $alumno->idInstitucion=session()->get('idInstitucion');
        $alumno->idCarrera=$request->carrera;
        $alumno->save();

        if($alumno->id){
            $this->inscribir($alumno->id);

            $datos['exito']=true;
            $datos['error']='Alumno registrado.';
        }else{
            $datos['exito']=false;
            $datos['error']='Error en el registro.';
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
        $alumno=array();
        $asignaturas=array();

        if(session()->get('idInstitucion')){
            $alumno=Alumno::find($id);

            $asignaturas=Asignatura::select('calificaciones.id', 'asignaturas.claveAsignatura', 'asignaturas.nombreAsignatura', 'calificaciones.calificacion', 'observaciones.descripcionObservacion')
            ->join('calificaciones', 'asignaturas.id', '=', 'calificaciones.idAsignatura')
            ->join('observaciones', 'calificaciones.idObservacion', '=', 'observaciones.id')
            ->where('calificaciones.idAlumno', '=', $id)
            ->get();

            return view('alumnos.ver', array('alumno'=>$alumno, 'asignaturas'=>$asignaturas));
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
        $alumno=array();
        $generos=array();
        $carreras=array();

        if(session()->get('idInstitucion')){
            $alumno=Alumno::find($id);
            $generos=Genero::all();
            $carreras=Carrera::all();

            return view('alumnos.editar', array('alumno'=>$alumno, 'generos'=>$generos, 'carreras'=>$carreras));
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
        $alumno=array();

        $datos=$request->validate=[
            'numeroControl'=>'required',
            'curp'=>'required|min:18',
            'nombre'=>'required|min:2',
            'primerApellido'=>'required|min:2',
            'genero'=>'required',
            'fechaNacimiento'=>'required',
            'carrera'=>'required',
            'id'=>'required'
        ];

        if($datos){
            $alumno=Alumno::find($request->id);

            if($alumno){
                $alumno->numeroControl=$request->numeroControl;
                $alumno->curp=$request->curp;
                $alumno->nombre=$request->nombre;
                $alumno->primerApellido=$request->primerApellido;
                $alumno->segundoApellido=$request->segundoApellido;
                $alumno->idGenero=$request->genero;
                $alumno->fechaNacimiento=$request->fechaNacimiento;
                $alumno->idCarrera=$request->carrera;
                $alumno->save();

                if($alumno->id){
                    $datos['exito']=true;
                    $datos['error']='Alumno actualizado.';
                }else{
                    $datos['exito']=false;
                    $datos['error']='Error durante la actualización.';
                }
            }else{
                $datos['exito']=false;
                $datos['error']='Actualización interrumpida inesperadamente.';
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
        $alumno=array();

        if(session()->get('idInstitucion')){
            $alumno=Alumno::find($id);

            return view('alumnos.eliminar', array('alumno'=>$alumno));
        }else{
            session()->flush();

            return view('login');
        }
    }

    /**
     * Borrar de la BD
     * @param Request $request->id
     * @return json
     */
    public function borrar(Request $request){
        $datos=array();
        $alumno=array();

        $datos=$request->validate=[
            'id'=>'required'
        ];

        if($datos){
            $alumno=Alumno::find($request->id);

            if($alumno){
                $alumno->delete();

                $datos['exito']=true;
                $datos['error']='Alumno eliminado';
            }else{
                $datos['exito']=false;
                $datos['error']='Borrado interrumpido inesperadamente.';
            }
        }else{
            $datos['exito']=false;
            $datos['error']='Borrado no iniciado.';
        }

        return response()->json($datos);
    }

    /**
     * Búsqueda de numero de control
     * @param Request $request->numeroControl
     * @return json(array)
     */
    public function verificarNumeroControl(Request $request){
        $alumno=array();
        $datos=array();

        $datos=$request->validate=[
            'numeroControl'=>'required|min:18|max:18'
        ];

        if($datos){
            $alumno=Alumno::where('numeroControl', '=', $request->numeroControl)->first();

            if($alumno){
                if($alumno->numeroControl==$request->numeroControl){
                    $datos['exito']=true;
                    $datos['error']='MATRICULA ya registrada.';
                }else{
                    $datos['exito']=false;
                    $datos['error']='MATRICULA permitida';
                }
            }else{
                $datos['exito']=false;
                $datos['error']='MATRICULA permitida.';
            }
        }else{
            $datos['exito']=false;
            $datos['error']='Verificación de MATRICULA interrumpida.';
        }

        return response()->json($datos);
    }

    /**
     * Búsqueda de CURP
     * @param Request $request->curp
     * @return json(array)
     */
    public function verificarCurp(Request $request){
        $datos=array();
        $alumno=array();

        $datos=$request->validate=[
            'curp'=>'required|min:18'
        ];

        if($datos){
            $alumno=Alumno::where('curp', '=', $request->curp)->first();

            if($alumno){

                if($alumno->curp==$request->curp){
                    $datos['exito']=true;
                    $datos['error']='CURP ya registrada.';
                }else{
                    $datos['exito']=false;
                    $datos['error']='CURP permitida';
                }
            }else{
                $datos['exito']=false;
                $datos['error']='CURP permitida';
            }
        }else{
            $datos['exito']=false;
            $datos['error']='Verificación interrumpida inesperadamente.';
        }

        return response()->json($datos);
    }

    /**
     * Validación de inicia para comprobar carreras
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
     *Solicitu de interfaz de calificaciones
     *@param Request $id
     *@return view 
     **/
    public function calificaciones($id){
        $asignaturas=array();
        $alumno=array();
        $observaciones=array();
        $ciclos=array();

        $alumno=Alumno::find($id);

        if($alumno){
            $observaciones=Observaciones::all();

            $asignaturas=Asignatura::select('asignaturas.id', 'asignaturas.nombreAsignatura')
            ->join('calificaciones', 'asignaturas.id', '=', 'calificaciones.idAsignatura')
            ->where('calificaciones.idAlumno', '=', $id)
            ->where('calificaciones.calificacion', '=', '0')->get();

            $ciclos=Ciclo::all();
        }

        return view('alumnos.calificaciones', array('alumno'=>$alumno, 'observaciones'=>$observaciones, 'asignaturas'=>$asignaturas, 'ciclos'=>$ciclos));
    }

    /**
     * Función para inscribir asignaturas
     * @param $id
     * @return json
     */
    public function inscribir($id){
        $asignaturas=array();
        $calificaciones=array();

        $asignaturas=Asignatura::select('asignaturas.id')
        ->join('alumnos', 'asignaturas.idCarrera', '=', 'alumnos.idCarrera')
        ->where('alumnos.id', '=', $id)->get();

        if($asignaturas){
            foreach($asignaturas as $asignatura){
                $calificaciones=New Calificaciones;
                $calificaciones->idAsignatura=$asignatura->id;
                $calificaciones->idAlumno=$id;
                $calificaciones->idObservacion=100;
                $calificaciones->idCiclo=1;
                $calificaciones->calificacion='0';
                $calificaciones->estatusCalificacion='No aprobada';
                $calificaciones->save();
            }
        }
    }

    /**
     * Función para obtener imagenes
     * @param Request
     * @return json
     */
    public function obtenerImagenes($id){
        $alumno=array();

        $alumno=Alumno::find($id);

        return view('alumnos.archivos', array('alumno'=>$alumno));
    }

    /**
     * Función para cargar imagenes
     * @param REquest
     * @return json
     */
    public function cargarImagenes(Request $request, $id){
        $datos=array();
        $alumno=array();

        $datos=$request->validate=[
            'fotografia'=>'required',
            'firma'=>'required'
        ];

        if($datos){
            $alumno=Alumno::find($id);

            if($alumno){
                if(file_exists($request->file('fotografia'))){
                    if($this->verificarFotografia($request)){
                        if(file_exists(public_path('img/alumnos/'.$alumno->fotografia))){
                            unlink(public_path('img/alumnos/'.$alumno->fotografia));
                        }
                        
                        $request->file('fotografia')->move('img/alumnos', $request->file('fotografia')->getClientOriginalName());
                        $alumno->fotografia=$request->file('fotografia')->getClientOriginalName();
                    }
                }else{
                    $datos['exito']=false;
                }
                
                if(file_exists($request->file('firma'))){
                    if($this->verificarFirma($request)){
                        if(file_exists(public_path('img/alumnos/'.$alumno->firmaAutografa))){
                            unlink(public_path('img/alumnos/'.$alumno->firmaAutografa));
                        }

                        $request->file('firma')->move('img/alumnos', $request->file('firma')->getClientOriginalName());
                        $alumno->firmaAutografa=$request->file('firma')->getClientOriginalName();
                    }else{
                        $datos['exito']=false;
                    }
                }
            
                $alumno->save();

                if($alumno->id){
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
            return redirect('/alumnos');
        }else{
            return redirect('/alumnos/imagenes/'.$id);
        }
    }

    public function verificarFotografia(Request $request){
        if($request->file('fotografia')->getClientOriginalExtension()=='png' || $request->file('fotografia')->getClientOriginalExtension()=="jpg" || $request->file('fotografia')->getClientOriginalExtension()=="jpeg"){
            return true;
        }else{
            return false;
        }
    }

    public function verificarFirma(Request $request){
        if($request->file('firma')->getClientOriginalExtension()=='png' || $request->file('firma')->getClientOriginalExtension()=="jpg" || $request->file('firma')->getClientOriginalExtension()=="jpeg"){
            return true;
        }else{
            return false;
        }
    }
}
