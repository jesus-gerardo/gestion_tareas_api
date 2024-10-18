<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tarea extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'titulo',
        'order',
        'descripcion',
        'estado',
        'fecha_creacion',
        'fecha_finalizacion'
    ];
}
