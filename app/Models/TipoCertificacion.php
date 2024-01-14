<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCertificacion extends Model
{
    use HasFactory;

    protected $table='tipo_certificaciones';

    protected $fillable=[
        'tipoCertificacion'
    ];
}
