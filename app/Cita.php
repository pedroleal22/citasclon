<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Cita extends Model
{
    protected $fillable = ['fecha_hora', 'medico_id', 'paciente_id', 'location_id', 'duracion', 'hora_fin'];

    public function medico()
    {
        return $this->belongsTo('App\Medico');
    }

    public function paciente()
    {
        return $this->belongsTo('App\Paciente');
    }

    public function location()
    {
        return $this->belongsTo('App\Location');
    }

    public function getHoraFin()
    {
        return Carbon::parse(($this->fecha_hora)->modify("+{$this->duracion} minutes"));
    }



}
