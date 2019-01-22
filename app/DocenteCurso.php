<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocenteCurso extends Model
{
    protected $table = "DOCENTECURSO";
    protected $primaryKey = 'IDDOCENTECURSO';
    protected $fillable = ['IDDOCENTECURSO','ASIGNATURACURSOID','iddocente','TOMA','CESE','HS','IDCONDICION','IDCENTROCOSTO'];

    public function docente(){
        return $this->belongsTo('\App\User','iddocente');
      }

    public function asignaturaCurso(){
        return $this->belongsTo('\App\AsignaturaCurso','ASIGNATURACURSOID');
      }
}
