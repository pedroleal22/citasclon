<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicina extends Model
{
    protected $fillable = ['name', 'composicion', 'presentacion', 'link'];


}
