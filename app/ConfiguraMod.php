<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConfiguraMod extends Model
{
    protected $table = 'CONFIGURAMOD';
    protected $fillable = ['IDCONFIGURAMOD','IDMODALIDAD','DESCRIPCION','DESDE','HASTA','ACTIVO','ANO'];
}
