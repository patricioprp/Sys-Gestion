<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsignaturaCurso extends Model
{
    protected $table = "ASIGNATURACURSO";
    protected $fillable = ['ASIGNATURACURSOID','ASIGNATURAID','IDNIVELES','IDDIVISION','ANIO','ORDEN','DIASCLASE','PORCETAJESDIAS','PROMEDIO','NUMERICA'];
}
