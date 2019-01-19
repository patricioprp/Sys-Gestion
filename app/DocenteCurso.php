<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocenteCurso extends Model
{
    protected $table = "DOCENTECURSO";
    protected $fillable = ['IDDOCENTECURSO','ASIGNATURACURSOID','IDDOCENTE','TOMA','CESE','HS','IDCONDICION','IDCENTROCOSTO'];
}
