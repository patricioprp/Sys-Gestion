<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    protected $table = 'NIVELES';
    protected $primaryKey = 'IDNIVELES';
    public $incrementing = false;
   // protected $keyType = 'string';
    protected $fillable = ['IDNIVELES','IDDET_CENTRO','DESCRIPCION','ABREVIA','TEXTO1','TEXTO2'];

    public function asignaturaCursos(){
        return $this->hasMany('\App\AsignaturaCurso','ASIGNATURACURSOID');
      }

      public function divisions(){
        return $this->hasMany('\App\AsignaturaCurso','ASIGNATURACURSOID');
      }

      public function asigCursos(){
        return $this->hasMany('\App\AsignaturaCurso','ASIGNATURACURSOID');// esta repetido
      }
}
