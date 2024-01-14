<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Entidades;

class Institucion extends Model
{
    use HasFactory;

    protected $table="instituciones";

    protected $fillable=[
        'idInstitucion', 
        'nombreInstitucion', 
        'idCampus', 
        'campus', 
        'idEntidadFederativa', 
        'entidadFederativa', 
        'email', 
        'password', 
        'numeroRvoe',
        'fechaExpedicionRvoe', 
        'estatusInstitucion'
    ];

    public function entidad(){
        return $this->hasOne(Entidades::class, 'id', 'idEntidadFederativa');
    }
}
