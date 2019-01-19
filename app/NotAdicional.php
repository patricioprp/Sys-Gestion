<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotAdicional extends Model
{
    protected $table = 'NOTADICIONAL';
    protected $fillable = ['IDNOTADICIONAL','ANO','IDALUMNO','IDPLANASIGADIC','NOTA','IDMODALIDAD','ORDEN','ASIGNATURAID'];
}
