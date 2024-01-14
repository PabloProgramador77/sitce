<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Institucion;

class Entidades extends Model
{
    use HasFactory;

    protected $table="entidades";

    protected $fillable=['nombreEntidad'];

    public function institucion(){
        return $this->hasOne(Institucion::class, 'id', 'idEntidadFederativa');
    }
}
