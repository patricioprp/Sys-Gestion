<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsignaturaCurso extends Model
{
    protected $table = "ASIGNATURACURSO";
    protected $primaryKey = 'ASIGNATURACURSOID';
    protected $fillable = ['ASIGNATURACURSOID','ASIGNATURAID','IDNIVELES','IDDIVISION','ANIO','ORDEN','DIASCLASE','PORCETAJESDIAS','PROMEDIO','NUMERICA'];

    public function docenteCurso(){
        return $this->hasMany('\App\DocenteCurso');
      }
}
