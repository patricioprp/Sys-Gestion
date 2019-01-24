<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    protected $table = 'ASIGNATURA';
    protected $primaryKey = 'ASIGNATURAID';
    protected $fillable = ['ASIGNATURAID','NOMBRE','IDTIPOMODALIDAD','NOTAADICIONAL','ABREVIA'];

    public function asignaturaCurso(){

        return $this->hasMany('\App\AsignaturaCurso','ASIGNATURACURSOID');
      }
      public function tipoModalidad(){
        return $this->belongsTo('\App\TipoModalidad','IDTIPOMODALIDAD');
      }
}
