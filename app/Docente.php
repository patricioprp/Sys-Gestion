<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $table = "DOCENTES";
    protected $fillable = ['id','name','calle','numero','piso','codpostal','codlocalidad','iddoc','numdoc','sexo','nacimiento','telefono1','telefono2','estaodcivil','idpais','email','cuil','cbu','ingreso','antig_reco_dias','egreso','idobrasocial','idsituacion','idcondicion','idactividad','idmodalidad','idprovloc','siniestro','seguro','password'];
}
