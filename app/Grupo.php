<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
   protected $table ="grupos";

   protected $fillable = ['nombre'];


   public function paises()
    {
        return $this->hasMany('App\Pais');
    }
}
