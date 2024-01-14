<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Observaciones;
use App\Models\Asignatura;
use App\Models\Ciclo;

class Calificaciones extends Model
{
    use HasFactory;

    protected $table="calificaciones";

    protected $fillable=[
        'idAsignatura', 'idAlumno', 'idObservacion', 'idCiclo', 'calificacion', 'estatusCalificacion'
    ];

    public function observaciones(){
        return $this->hasOne(Observaciones::class, 'id', 'idObservacion');
    }

    public function asignaturas(){
        return $this->hasOne(Asignatura::class, 'id', 'idAsignatura');
    }

    public function ciclo(){
        return $this->hasOne(Ciclo::class, 'id', 'idCiclo');
    }
}
