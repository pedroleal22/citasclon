<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['hospital', 'consulta'];

    public function citas()
    {
        return $this->hasMany('App\Cita');
    }

    public function getCompleteLocation()
    {
        return $this->hospital .', consulta  '.$this->consulta;
    }

}
