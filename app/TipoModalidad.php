<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoModalidad extends Model
{
    protected $table = 'TIPOMODALIDAD';
    protected $fillable = ['IDTIPOMODALIDAD','CODIGO','DESCRIPCION'];
}
