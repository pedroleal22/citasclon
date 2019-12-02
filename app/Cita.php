<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon as Time;

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

/*
      /** Calcular hora fin de una cita dada su duración @return string*/

/*
    public static function calcHoraFin($fecha_hora, $duracion) {

        $duracion = duracion;
        $hora_fin = $fecha_hora;

        //$hora_fin->add(new DateInterval('PT' . $duracion2 . 'M'));
        $hora_fin->modify("+{$duracion} minutes");
/*
        // Calcular hora fin
        return Time::createFromTime($hora_inicio->hour, $hora_inicio->minute)
            ->addHours($duracion->hour)
            ->addMinutes($duracion->minute)
            ->toTimeString();*/
    //}
/*
    public static function calcHoraFin($pDuracion, $pHoraInicio) {

        // Parse duración
        $duracion = Time::parse($pDuracion);
        try {
            // Parse hora incio
            $hora_inicio = Time::parse($pHoraInicio);
        }
        catch (\Exception $e) {
            return false;
        }

        // Calcular hora fin
        return Time::createFromTime($hora_inicio->hour, $hora_inicio->minute)
            ->addHours($duracion->hour)
            ->addMinutes($duracion->minute)
            ->toTimeString();
    }*/

    /**Calcular duracion de una cita    @return string

    public function duration($toTimeString = false)
    {
        // Set start and end time
        $startTime = Time::parse($this->attributes['hora_inicio']);
        $endTime = Time::parse($this->attributes['hora_fin']);

        // Get difference in time
        $duration = $startTime->diffInSeconds($endTime);

        // Convert to time string
        if ($toTimeString) {
            $duration = gmdate('G:i', $duration);
        }
        // Return duration
        return $duration;
    }

*/
}
