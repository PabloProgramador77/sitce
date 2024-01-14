<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Periodo;
use App\Models\NivelEstudio;

class Carrera extends Model
{
    use HasFactory;

    protected $table="carreras";

    protected $fillable=[
        'idCarrera',
        'nombreCarrera',
        'claveCarrera',
        'idTipoPeriodo',
        'clavePlan',
        'idNivelEstudios',
        'calificacionMinima',
        'calificacionMaxima',
        'calificacionMinimaAprobatoria',
        'idInstitucion'
    ];

    public function periodo(){
        return $this->hasOne(Periodo::class, 'id', 'idTipoPeriodo');
    }

    public function nivelEstudio(){
        return $this->hasOne(NivelEstudio::class, 'id', 'idNivelEstudios');
    }
}
