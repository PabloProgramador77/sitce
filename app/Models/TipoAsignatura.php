<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoAsignatura extends Model
{
    use HasFactory;

    protected $table="tipo_asignaturas";

    protected $fillable=[
        'tipoAsignatura'
    ];
}
