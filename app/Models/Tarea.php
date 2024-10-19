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
        'picture',
        'descripcion',
        'estado',
        'fecha_creacion',
        'fecha_finalizacion'
    ];

    protected $appends = ['picture_url'];

    public function getPictureUrlAttribute()
    {
        if (is_null($this->picture)) {
            return null;
        }
        return env('APP_URL') . '/storage/' . $this->picture;
    }
}
