<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    protected $table = 'NIVELES';
    protected $fillable = ['IDNIVELES','IDDET_CENTRO','DESCRIPCION','ABREVIA','TEXTO1','TEXTO2'];
}
