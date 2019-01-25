<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoModalidad extends Model
{
    protected $table = 'TIPOMODALIDAD';
    protected $primaryKey = 'IDTIPOMODALIDAD';
    protected $fillable = ['IDTIPOMODALIDAD','CODIGO','DESCRIPCION'];

    public function modalidades(){
        return $this->hasMany('\App\Modalidad','IDMODALIDAD');
      }

    public function asignaturas(){
        return $this->hasMany('\App\Asignatura','ASIGNATURAID');
      }


}
