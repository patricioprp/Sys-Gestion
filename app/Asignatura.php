<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    protected $table = 'ASIGNATURA';
    protected $primaryKey = 'ASIGNATURAID';
    protected $fillable = ['ASIGNATURAID','NOMBRE'];

    public function asignaturaCurso(){

        return $this->hasMany('\App\AsignaturaCurso','ASIGNATURACURSOID');
      }
}
