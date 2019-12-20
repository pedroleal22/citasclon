<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $fillable = ['nombre'];




    public function locations()
    {
        return $this->hasMany('App\Location');
    }
    public function citas()
    {
        return $this->hasMany('App\Citas');
    }
}
