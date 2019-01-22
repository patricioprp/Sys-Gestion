<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $table = 'DIVISIONES';
    protected $primaryKey = 'IDDIVISION';
    protected $fillable = ['IDDIVISION','IDNIVELES','DESCRIPCION','ABREVIA','NOMNIV','NOMDIV','PASADIV','PASANIV','PROXMAT','CUOTAS','VENCE','TEXTO','IDTIPOCUOTA','LUGARPAGO'];


    public function asignaturaCursos(){
        return $this->hasMany('\App\AsignaturaCurso','ASIGNATURACURSOID');
      }

    public function nivel(){
        return $this->belongsTo('\App\Nivel','IDNIVELES');
      }
}
