<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoNota extends Model
{
    protected $table = 'TIPONOTA';
    protected $fillable = ['TIPONOTAID','CODIGO','DESCRIPCION','IDMODALIDAD','NOTA','PRIORIDAD','NOMCOLUMNA','LIBRETA','COD_REF','INSTANCIA','NOMLIBRETA'];
}
