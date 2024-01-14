<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    use HasFactory;

    protected $table="responsables";

    protected $fillable=[
        'curp',
        'nombre',
        'primerApellido',
        'segundoApellido',
        'idCargo',
        'archivoCer',
        'archivoKey',
        'passwordKey',
        'idInstitucion'
    ];

    public function cargo(){
        return $this->hasOne(Cargo::class, 'id', 'idCargo');
    }
}
