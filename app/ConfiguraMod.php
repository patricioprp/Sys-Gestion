<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConfiguraMod extends Model
{
    protected $table = 'CONFIGURAMOD';
    protected $primaryKey = 'IDCONFIGURAMOD';
    protected $fillable = ['IDCONFIGURAMOD','IDMODALIDAD','DESCRIPCION','DESDE','HASTA','ACTIVO','ANO'];

    public function modalidad(){
        return $this->belongsTo('\App\Modalidad','IDMODALIDAD');
      }
}
