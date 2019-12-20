<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['hospital','consulta_id'];

    public function citas()
    {
        return $this->hasMany('App\Cita');
    }


    public function consulta()
    {
        return $this->belongsTo('App\Consulta'); //related
    }


    /*  public function getCompleteLocation()
      {
          return $this->hospital .', consulta  '.$this->consulta;
      }*/
}
