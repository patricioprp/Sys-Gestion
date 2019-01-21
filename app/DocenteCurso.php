<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocenteCurso extends Model
{
    protected $table = "DOCENTECURSO";
    protected $primaryKey = 'IDDOCENTECURSO';
    protected $fillable = ['IDDOCENTECURSO','ASIGNATURACURSOID','IDDOCENTE','TOMA','CESE','HS','IDCONDICION','IDCENTROCOSTO'];

    public function docente(){
        return $this->belongsTo('\App\User','id');
      }

    public function asignaturaCurso(){
        return $this->belongsTo('\App\AsignaturaCurso','ASIGNATURACURSOID');
      }
}
