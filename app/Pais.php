<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table = 'paises';
    protected $fillable=['nombre','foto','id_grupo'];

    public function grupo()
    {
        return $this->belongsTo('App\Grupo');
    }
}
