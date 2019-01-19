<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    protected $table = 'DOCENTES';
    protected $fillable = ['ASIGNATURAID','NOMBRE', 'IDTIPOMODALIDAD','NOTAADICIONAL','ABREVIA'];
}
