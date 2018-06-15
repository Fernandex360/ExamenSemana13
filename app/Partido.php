<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    protected $table='partidos';
    protected $fillable=['fecha','hora','id_lugares','equipo1','equipo2'];

     public function lugar()
    {
        return $this->belongsTo('App\Lugar');
    }
     public function pais()
    {
        return $this->hasMany('App\Pais');
    }

}
