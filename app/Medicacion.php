<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicacion extends Model
{
    //
    protected $fillable = ['tratamiento_id', 'medicina_id', 'unidades','frecuencia','instrucciones'];


    public function tratamiento()
    {
        return $this->belongsTo('App\Tratamiento'); //related
    }

    public function medicina()
    {
        return $this->belongsTo('App\Medicina'); //related
    }




}
