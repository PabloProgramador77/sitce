<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Archivo;
use App\Models\Expediciones;
use App\Models\Institucion;
use App\Models\Responsable;
use App\Models\Alumno;
use App\Models\Carrera;
use App\Models\Asignatura;
use App\Models\Calificaciones;
use App\Models\Ciclo;
use XMLWriter;
use Carbon\Carbon;

class ArchivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $archivos=array();

        if(session()->get('idInstitucion')){
            $archivos=Archivo::all();
            
            return view('archivos.index', array('archivos'=>$archivos));
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
        return response()->view('xml')->header('Content-Type', 'text/xml');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $archivo=array();
        $expedicion=array();

        if(session()->get('idInstitucion')){
            $expedicion=Expediciones::find($id);

            if(!empty($expedicion)){
                $archivo=Archivo::where('nombreArchivo', '=', $expedicion->folio.'.xml')
                ->where('idExpedicion', '=', $expedicion->id)
                ->where('idInstitucion', '=', session()->get('idInstitucion'))
                ->first();

                if(!empty($archivo)){
                    $this->crearXml($archivo, $expedicion);

                    return redirect('/xml');
                }else{
                    $archivo=new Archivo;
                    $archivo->nombreArchivo=$expedicion->folio.".xml";
                    $archivo->idExpedicion=$expedicion->id;
                    $archivo->estatusArchivo='Creado';
                    $archivo->idInstitucion=session()->get('idInstitucion');
                    $archivo->save();

                    if($archivo->id){
                        $this->crearXml($archivo, $expedicion);

                        return redirect('/xml');
                    }else{
                        return redirect('/expediciones');
                    }
                }
            }else{
                return redirect('/expediciones');
            }
        }else{
            sessio()->flush();

            return view('login');
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
     * Crear archivo XML
     * @param null
     * @return json
     */
    public function crearXml($archivo, $expedicion){
        $datos=array();
        $promedio=0;
        $creditos=0;
        $totalAsig=0;
        $totalCreditos=0;
        $ciclos=0;
        $datosSello=array();
        $xml=new XMLWriter();
        $xml->openURI('C:/Laragon/www/sitce/public/archivos/xml/'.$expedicion->folio.'.xml');
        $xml->setIndent(true);
        
        $datosSello=$this->cadenaOriginal($expedicion);

        $datos=$this->obtenerExpedicion($expedicion);

        $xml->startDocument('1.0', 'utf-8');
            $xml->startElement('Dec');
                $xml->writeAttribute('xmlns', 'https://www.siged.sep.gob.mx/certificados/');
                $xml->writeAttribute('xmlns:xs', 'http://www.w3.org/2001/XMLSchema');
                $xml->writeAttribute('noCertificadoResponsable', $datosSello['noCertificado']);
                $xml->writeAttribute('certificadoResponsable', $datosSello['certificado']);
                $xml->writeAttribute('sello', $datosSello['sello']);
                $xml->writeAttribute('folioControl', $datos->folio);
                $xml->writeAttribute('tipoCertificado', '5');
                $xml->writeAttribute('version', '3.0');

                $xml->startElement('ServicioFirmante');
                    $datos=$this->obtenerIpes();
                    $xml->writeAttribute('idEntidad', $datos->idInstitucion);
                $xml->endElement();
                
                $xml->startElement('Ipes');
                    $xml->writeAttribute('entidadFederativa', $datos->nombreEntidad);
                    $xml->writeAttribute('idEntidadFederativa', $datos->idEntidadFederativa);
                    $xml->writeAttribute('campus', $datos->campus);
                    $xml->writeAttribute('idCampus', $datos->idCampus);
                    $xml->writeAttribute('idNombreInstitucion', $datos->idInstitucion);
                    
                    $xml->startElement('Responsable');
                        $datos=$this->obtenerResponsable();

                        $xml->writeAttribute('cargo', $datos->descripcionCargo);
                        $xml->writeAttribute('idCargo', $datos->idCargo);
                        $xml->writeAttribute('segundoApellido', $datos->segundoApellido);
                        $xml->writeAttribute('primerApellido', $datos->primerApellido);
                        $xml->writeAttribute('nombre', $datos->nombre);
                        $xml->writeAttribute('curp', $datos->curp);
                    $xml->endElement();
                $xml->endElement();

                $datos=$this->obtenerCarrera($expedicion);

                $xml->startElement('Rvoe');
                    $xml->writeAttribute('fechaExpedicion',$datos->fechaExpedicionRvoe.'T00:00:00');
                    $xml->writeAttribute('numero', $datos->rvoe);
                $xml->endElement();

                $xml->startElement('Carrera');
                    $xml->writeAttribute('calificacionMinimaAprobatoria', number_format($datos->calificacionMinimaAprobatoria, 2));
                    $xml->writeAttribute('calificacionMaxima', $datos->calificacionMaxima);
                    $xml->writeAttribute('calificacionMinima', $datos->calificacionMinima);
                    $xml->writeAttribute('nivelEstudios', $datos->nivelEstudio->descripcionEstudio);
                    $xml->writeAttribute('idNivelEstudios', $datos->idNivelEstudios);
                    $xml->writeAttribute('clavePlan', $datos->clavePlan);
                    $xml->writeAttribute('tipoPeriodo', $datos->periodo->tipoPeriodo);
                    $xml->writeAttribute('idTipoPeriodo', $datos->idTipoPeriodo);
                    $xml->writeAttribute('nombreCarrera', $datos->nombreCarrera);
                    $xml->writeAttribute('claveCarrera', $datos->claveCarrera);
                    $xml->writeAttribute('idCarrera', $datos->idCarrera);
                $xml->endElement();

                $xml->startElement('Alumno');
                    $datos=$this->obtenerAlumno($expedicion);
                    //$xml->writeAttribute('firmaAutografa', $this->cifrarFirma($datos->firmaAutografa));
                    //$xml->writeAttribute('foto', $this->cifrarFotografia($datos->fotografia));
                    $xml->writeAttribute('fechaNacimiento', $datos->fechaNacimiento.'T00:00:00');
                    $xml->writeAttribute('idGenero', $datos->idGenero);
                    $xml->writeAttribute('segundoApellido', $datos->segundoApellido);
                    $xml->writeAttribute('primerApellido', $datos->primerApellido);
                    $xml->writeAttribute('nombre', $datos->nombre);
                    $xml->writeAttribute('curp', $datos->curp);
                    $xml->writeAttribute('numeroControl', $datos->numeroControl);
                $xml->endElement();

                $xml->startElement('Expedicion');
                    $xml->writeAttribute('lugarExpedicion', $expedicion->institucion->campus);
                    $xml->writeAttribute('idLugarExpedicion', $expedicion->institucion->idEntidadFederativa);
                    $xml->writeAttribute('fecha', date('Y-m-d', strtotime($expedicion->created_at->format('Y-m-d'))).'T00:00:00');
                    $xml->writeAttribute('tipoCertificacion', $expedicion->certificacion->tipoCertificacion);
                    $xml->writeAttribute('idTipoCertificacion', $expedicion->idTipoCertificacion);
                $xml->endElement();

                $xml->startElement('Asignaturas');
                    $datos=$this->obtenerAsignaturas($expedicion);
                    $promedio=$this->obtenerPromedio($expedicion);
                    $promedio=($promedio/count($datos));
                    $creditos=$this->obtenerCreditos($expedicion);
                    $totalCreditos=$this->creditos($expedicion);
                    $ciclos=$this->obtenerCiclos($expedicion);

                    $xml->writeAttribute('numeroCiclos', count($ciclos));
                    $xml->writeAttribute('creditosObtenidos', number_format($creditos, 2));
                    $xml->writeAttribute('totalCreditos', number_format($totalCreditos, 2));

                    if($promedio==10){
                        $xml->writeAttribute('promedio', substr($promedio, 0, 2));
                    }else{
                        $xml->writeAttribute('promedio', substr($promedio, 0, 4));
                    }
                    
                    $xml->writeAttribute('asignadas', count($datos));
                    $xml->writeAttribute('total', count($datos));

                    foreach ($datos as $dato) {
                        $promedio+=$dato->calificacion;
                        $creditos+=$dato->creditos;

                        $xml->startElement('Asignatura');
                            $xml->writeAttribute('creditos', number_format($dato->creditos, 2));
                            $xml->writeAttribute('tipoAsignatura', $dato->tipoAsignatura->tipoAsignatura);
                            $xml->writeAttribute('idTipoAsignatura', $dato->idTipoAsignatura);
                            $xml->writeAttribute('observaciones', $dato->descripcionObservacion);
                            $xml->writeAttribute('idObservaciones', $dato->id);
                            if($dato->calificacion<10){
                                $xml->writeAttribute('calificacion', number_format($dato->calificacion, 2));
                            }else{
                                $xml->writeAttribute('calificacion', number_format($dato->calificacion, 0));
                            }
                            $xml->writeAttribute('ciclo', $dato->nombreCiclo);
                            $xml->writeAttribute('nombre', $dato->nombreAsignatura);
                            $xml->writeAttribute('claveAsignatura', $dato->claveAsignatura);
                            $xml->writeAttribute('idAsignatura', $dato->idAsignatura);
                        $xml->endElement();
                    }
                    
                $xml->endElement();
            $xml->endElement();
        $xml->fullEndElement();
    }

    public function obtenerExpedicion($request){
        $expedicion=Expediciones::find($request->id);

        return $expedicion;
    }

    public function obtenerIpes(){
        $institucion=Institucion::select('*')
        ->join('entidades', 'instituciones.idEntidadFederativa', '=', 'entidades.id')
        ->where('instituciones.id', '=', session()->get('idInstitucion'))
        ->first();

        return $institucion;
    }

    public function obtenerResponsable(){
        $responsables=Responsable::select('*')
        ->join('cargos', 'responsables.idCargo', '=', 'cargos.id')
        ->where('responsables.idInstitucion', '=', session()->get('idInstitucion'))
        ->first();

        return $responsables;
    }

    public function obtenerCarrera($expedicion){
        $carrera=Carrera::select('carreras.idCarrera', 'carreras.nombreCarrera', 'carreras.idTipoPeriodo', 'carreras.clavePlan', 'carreras.idNivelEstudios', 'carreras.calificacionMinima', 'carreras.calificacionMaxima', 'carreras.calificacionMinimaAprobatoria', 'carreras.rvoe', 'carreras.fechaExpedicionRvoe', 'carreras.claveCarrera')
        ->join('alumnos', 'carreras.id', '=', 'alumnos.idCarrera')
        ->where('alumnos.idInstitucion', '=', session()->get('idInstitucion'))
        ->where('alumnos.id', '=', $expedicion->idAlumno)
        ->first();

        return $carrera;
    }

    public function obtenerAlumno($expedicion){
        $alumno=Alumno::find($expedicion->idAlumno);

        return $alumno;
    }

    public function obtenerAsignaturas($expedicion){
        $asignaturas=Asignatura::select('asignaturas.idAsignatura', 'ciclos.nombreCiclo', 'calificaciones.calificacion', 'asignaturas.creditos', 'asignaturas.idTipoAsignatura', 'observaciones.descripcionObservacion', 'observaciones.id', 'asignaturas.claveAsignatura', 'asignaturas.nombreAsignatura')
        ->join('alumnos', 'asignaturas.idCarrera', '=', 'alumnos.idCarrera')
        ->join('calificaciones', 'asignaturas.id', '=', 'calificaciones.idAsignatura')
        ->join('ciclos', 'calificaciones.idCiclo', '=', 'ciclos.id')
        ->join('observaciones', 'calificaciones.idObservacion', '=', 'observaciones.id')
        ->where('alumnos.id', '=', $expedicion->idAlumno)
        ->where('calificaciones.idAlumno', '=', $expedicion->idAlumno)
        ->get();

        return $asignaturas;
    }

    public function obtenerPromedio($expedicion){
        $promedio=Calificaciones::select('calificacion')
        ->where('idAlumno', '=', $expedicion->idAlumno)
        ->sum('calificacion');

        return $promedio;
    }

    public function obtenerCreditos($expedicion){
        $creditos=Asignatura::select('asignaturas.creditos')
        ->join('alumnos', 'asignaturas.idCarrera', '=', 'alumnos.idCarrera')
        ->join('calificaciones', 'asignaturas.id', '=', 'calificaciones.idAsignatura')
        ->where('alumnos.id', '=', $expedicion->idAlumno)
        ->where('calificaciones.idAlumno', '=', $expedicion->idAlumno)
        ->sum('creditos');

        return $creditos;
    }

    public function creditos($expedicion){
        $creditos=Asignatura::select('asignaturas.creditos')
        ->join('alumnos', 'asignaturas.idCarrera', '=', 'alumnos.idCarrera')
        ->where('alumnos.idInstitucion', '=', session()->get('idInstitucion'))
        ->where('alumnos.id', '=', $expedicion->idAlumno)
        ->sum('creditos');

        return $creditos;
    }

    public function obtenerCiclos($expedicion){
        $ciclos=Ciclo::select('ciclos.id')
        ->join('calificaciones', 'ciclos.id', '=', 'calificaciones.idCiclo')
        ->where('calificaciones.idAlumno', '=', $expedicion->idAlumno)
        ->distinct()
        ->get();

        return $ciclos;
    }

    public function descargar($nombre){
        $headers = [
            'Content-Type' => 'application/xml',
         ];

        if(file_exists(public_path('archivos/xml/'.$nombre))){
            return response()->download(public_path('archivos/xml/'.$nombre, $nombre, $headers));
        }
    }

    /**
     * Crear cadena original
     * @param Request
     * @return string
     */
    public function cadenaOriginal($expedicion){
        $datosExpedicion=array();
        $datosIpes=array();
        $datosResponsable=array();
        $datosAlumno=array();
        $datosAsignaturas=array();
        $datosCarrera=array();
        $datosPromedio=array();
        $totalCreditos=array();
        $datosCreditos=array();
        $datosSello=array();
        $ciclos=array();
        $sello='';

        $datosExpedicion=$this->obtenerExpedicion($expedicion);
        $datosIpes=$this->obtenerIpes();
        $datosAlumno=$this->obtenerAlumno($expedicion);
        $datosAsignaturas=$this->obtenerAsignaturas($expedicion);
        $datosCarrera=$this->obtenerCarrera($expedicion);
        $datosResponsable=$this->obtenerResponsable();
        $datosPromedio=$this->obtenerPromedio($expedicion);
        $totalCreditos=$this->creditos($expedicion);
        $datosCreditos=$this->obtenerCreditos($expedicion);
        $ciclos=$this->obtenerCiclos($expedicion);
        

        $cadenaOriginal='||3.0|5|';
        $cadenaOriginal.=$datosIpes->idInstitucion.'|'.$datosIpes->idInstitucion.'|'.$datosIpes->idCampus.'|'.$datosIpes->entidad->id.'|';
        $cadenaOriginal.=$datosResponsable->curp.'|'.$datosResponsable->idCargo.'|'.$datosCarrera->rvoe.'|'.$datosCarrera->fechaExpedicionRvoe.'T00:00:00|';
        $cadenaOriginal.=$datosCarrera->idCarrera.'|'.$datosCarrera->idTipoPeriodo.'|'.$datosCarrera->clavePlan.'|'.$datosCarrera->idNivelEstudios.'|'.$datosCarrera->calificacionMinima.'|'.$datosCarrera->calificacionMaxima.'|'.number_format($datosCarrera->calificacionMinimaAprobatoria, 2).'|';
        $cadenaOriginal.=$datosAlumno->numeroControl.'|'.$datosAlumno->curp.'|'.$datosAlumno->nombre.'|'.$datosAlumno->primerApellido.'|'.$datosAlumno->segundoApellido.'|'.$datosAlumno->idGenero.'|'.$datosAlumno->fechaNacimiento.'T00:00:00|';
        $cadenaOriginal.=$datosExpedicion->idTipoCertificacion.'|'.date('Y-m-d', strtotime($datosExpedicion->created_at->format('Y-m-d'))).'T00:00:00|'.$datosIpes->entidad->id.'|'.count($datosAsignaturas).'|'.count($datosAsignaturas).'|'.substr($datosPromedio/count($datosAsignaturas), 0, 4).'|'.number_format($totalCreditos, 2).'|'.number_format($datosCreditos, 2).'|'.count($ciclos).'|';

        foreach($datosAsignaturas as $asignatura){
            if($asignatura->calificacion<10){
                $cadenaOriginal.=$asignatura->idAsignatura.'|'.$asignatura->nombreCiclo.'|'.number_format($asignatura->calificacion, 2).'|'.$asignatura->tipoAsignatura->id.'|'.number_format($asignatura->creditos, 2).'|';
            }else{
                $cadenaOriginal.=$asignatura->idAsignatura.'|'.$asignatura->nombreCiclo.'|'.number_format($asignatura->calificacion, 0).'|'.$asignatura->tipoAsignatura->id.'|'.number_format($asignatura->creditos, 2).'|';
            }
            
        }

        $cadenaOriginal.='|';

        $fileXML=fopen(public_path('archivos/xml/'.$expedicion->folio.'.txt'), 'w');
        fwrite($fileXML, $cadenaOriginal);
        fclose($fileXML);

        $datosSello['noCertificado']=$this->noCertificado($datosResponsable);
        $datosSello['certificado']=$this->certificado($datosResponsable);
        $datosSello['firma']=$this->firma($datosResponsable);
        openssl_sign($cadenaOriginal, $sello, $datosSello['firma'], OPENSSL_ALGO_SHA256);
        $datosSello['sello']=base64_encode($sello);

        return $datosSello;
    }

    public function noCertificado($datosResponsable){
        $noCertificado='';
        $certificado='';
        $i=0;

        $noCertificado=shell_exec(public_path('openssl-1.0.2p/bin/openssl x509 -text -inform PEM -in '.public_path('archivos/'.$datosResponsable->archivoCer.'.pem -noout -serial')));
        
        $i=strpos($noCertificado, 'serial=');
        $noCertificado=substr($noCertificado, $i+7);
        $noCertificado=trim($noCertificado);
        $noCertificado=mb_eregi_replace('[\n|\r|\r\n|\t]', '', $noCertificado);

        $i=1;
        while($i<=strlen($noCertificado)){
            $certificado.=$noCertificado[$i];
            $i+=2;
        }

        return $certificado;
    }

    public function certificado($datosResponsable){
        $certificado='';
        $i=0;
        $f=0;

        $certificado=shell_exec(public_path('openssl-1.0.2p/bin/openssl x509 -text -inform PEM -in '.public_path('archivos/'.$datosResponsable->archivoCer.'.pem')));

        $i=strpos($certificado, 'BEGIN CERTIFICATE');
        $f=strpos($certificado, 'END CERTIFICATE');
        $certificado=substr($certificado, $i+22, (int)($f-6)-($i+22));
        $certificado=trim($certificado);
        $certificado=mb_eregi_replace('[\n|\r|\r\n|\t]', '', $certificado);

        return $certificado;
    }

    public function firma($datosResponsable){
        $firma='';

        $firma=(string)shell_exec(public_path('openssl-1.0.2p/bin/openssl rsa -inform PEM -outform PEM -in '.public_path('archivos/'.$datosResponsable->archivoKey.'.pem')));

        return $firma;
    }

}
