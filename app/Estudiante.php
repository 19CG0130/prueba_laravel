<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table = 'estudiante';

    protected $fillable = [
        'nombre',
        'apellidos',
        'edad',
        'email',
        'telefono',
        'grupo_id'
    ];

    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }

}
