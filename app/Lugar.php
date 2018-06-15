<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lugar extends Model
{
    protected $table = 'lugares';
    protected $fillable=['nombre'];


    public function partidos(){
    	return $this->hasMany('App\Partido');
    }
}
