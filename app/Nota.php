<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $table = 'NOTAS';
	protected $primaryKey = 'NOTAID';
    protected $fillable =['NOTAID','IDALUMNO','ASIGNATURAID','NOTA','IDNIVELES','IDDIVISION','ANIO','ESTADOASINATURAID','IDMODALIDAD','TIPONOTAID','ASIGNATURA','ORDEN','ASIGNATURACURSOID','IDUSUARIO','FEHCAMOD'];
    public $timestamps = false;


    public function alumno(){
        return $this->belongsTo('\App\Alumno','IDALUMNO');
      }

    public function division(){
        return $this->belongsTo('\App\Division','IDDIVISION');
      }

    public function asignatura(){
        return $this->belongsTo('\App\Asignatura','ASIGNATURAID');
    }
}
