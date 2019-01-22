<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'ALUMNOS';
    protected $primaryKey = 'IDALUMNO';
    protected $fillable = ['IDALUMNO','APELLIDOS','NOMBRES','DOC','SEXO','GRPSANG','FECHA_NACIM','PROVNAC','PROVDOM','CODIGO_POSTAL','DOMICILIO','TELEFONO','EMAIL','PIN','COLSEC','PERS_USR','PERS_DAT','PERS_OBS','TELEFONO1','TELEFONO2','PROFESION','TRABAJO','NUMHIJOS','FECHA_FALLEC','NUMHERMANOS','REMUNERACION','TIPOVIVIENDA','VALORVIVIENDA','CUIL','IDPAIS','IDLOCALIDAD','IDLOCALIDADNAC','IDDOCTIPO','INGRESO','EGRESO','CODIGOMORA','FECHAMORA','CBU','ACTAMATRICULA','ESTADOCIVIL','FOTO','SALUD'];

    public function notAdicionals(){
        return $this->hasMany('\App\NotAdicional','IDNOTAADICIONAL');
      }
}
