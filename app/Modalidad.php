<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modalidad extends Model
{
    protected $table = 'MODALIDAD';
    protected $fillable = ['IDMODALIDAD','IDTIPOMODALIDAD','EVALUACION','DESCRIPCION','ORDENMOD','HOJALIBRETA'];
}
