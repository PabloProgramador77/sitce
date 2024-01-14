<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Genero;
use App\Models\Carrera;
use App\Models\Calificaciones;

class Alumno extends Model
{
    use HasFactory;

    protected $table="alumnos";

    protected $fillable=[
        'numeroControl',
        'curp',
        'nombre',
        'primerApellido',
        'segundoApellido',
        'idGenero',
        'fechaNacimiento',
        'fotografia',
        'firmaAutografa',
        'idInstitucion'
    ];

    public function genero(){
        return $this->hasOne(Genero::class, 'id', 'idGenero');
    }

    public function carrera(){
        return $this->hasOne(Carrera::class, 'id', 'idCarrera');
    }

    public function calificaciones(){
        return $this->belongsToMany(Calificaciones::class, 'calificaciones', 'id', 'idAlumno');
    }
}
