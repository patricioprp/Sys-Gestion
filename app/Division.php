<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $table = 'DIVISIONES';
    protected $fillable = ['IDDIVISIONES','IDNIVELES','DESCRIPCION','ABREVIA','NOMNIV','NOMDIV','PASADIV','PASANIV','PROXMAT','CUOTAS','VENCE','TEXTO','IDTIPOCUOTA','LUGARPAGO'];
}
