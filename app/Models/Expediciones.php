<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Alumno;
use App\Models\TipoCertificacion;
use App\Models\Institucion;

class Expediciones extends Model
{
    use HasFactory;

    protected $table='expediciones';

    protected $fillable=[
        'idTipoCertificacion',
        'idLugarExpedicion',
        'idAlumno'
    ];

    public function alumno(){
        return $this->hasOne(Alumno::class, 'id', 'idAlumno');
    }

    public function certificacion(){
        return $this->hasOne(TipoCertificacion::class, 'id', 'idTipoCertificacion');
    }

    public function institucion(){
        return $this->hasOne(Institucion::class, 'id', 'idLugarExpedicion');
    }
}
