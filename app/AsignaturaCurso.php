<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsignaturaCurso extends Model
{
    protected $table = "ASIGNATURACURSO";
    protected $primaryKey = 'ASIGNATURACURSOID';
    protected $fillable = ['ASIGNATURACURSOID','ASIGNATURAID','IDNIVELES','IDDIVISION','ANIO','ORDEN','DIASCLASE','PORCETAJESDIAS','PROMEDIO','NUMERICA'];

    public function docenteCursos(){
        return $this->hasMany('\App\DocenteCurso','IDDOCENTECURSO');
      }

    public function asignatura(){
        return $this->belongsTo('\App\Asignatura','ASIGNATURAID');
      }

    public function division(){
        return $this->belongsTo('\App\Division','IDDIVISION');
      }
      
    public function nivel(){
        return $this->belongsTo('\App\Nivel','IDNIVELES');
      }
}
