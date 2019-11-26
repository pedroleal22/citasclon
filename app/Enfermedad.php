<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enfermedad extends Model
{
    protected $fillable = ['nombreComun','especialidad_id'];

    public function especialidad()
    {
        return $this->belongsTo('App\Especialidad');
    }

    public function paciente()
    {
        return $this->hasMany('App\Paciente');
    }
}
