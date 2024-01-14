<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Expediciones;

class Archivo extends Model
{
    use HasFactory;

    protected $table="archivos";

    protected $fillable=[
        'nombreArchivo',
        'idExpedicion',
        'idInstitucion'
    ];

    public function expedicion(){
        return $this->hasOne(Expediciones::class, 'id', 'idExpedicion');
    }
}
