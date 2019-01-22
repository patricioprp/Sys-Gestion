<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotAdicional extends Model
{
    protected $table = 'NOTADICIONAL';
    protected $primaryKey = 'IDNOTAADICIONAL';
    protected $fillable = ['IDNOTAADICIONAL','ANO','IDALUMNO','IDPLANASIGADIC','NOTA','IDMODALIDAD','ORDEN','ASIGNATURAID'];

    public function alumno(){
        return $this->belongsTo('\App\Alumno','IDALUMNO');
      }
}
