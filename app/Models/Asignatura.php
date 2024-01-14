<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TipoAsignatura;
use App\Models\Carrera;

class Asignatura extends Model
{
    use HasFactory;

    protected $table="asignaturas";

    protected $fillable=[
        'idAsignatura',
        'claveAsignatura',
        'nombreAsignatura',
        'calificacion',
        'idObservaciones',
        'idTipoAsignatura',
        'creditos',
        'idInstitucion'
    ];

    public function tipoAsignatura(){
        return $this->hasOne(TipoAsignatura::class, 'id', 'idTipoAsignatura');
    }

    public function carrera(){
        return $this->hasOne(Carrera::class, 'id', 'idCarrera');
    }
}
