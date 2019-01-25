<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoNota extends Model
{
    protected $table = 'TIPONOTA';
    protected $primaryKey = 'TIPONOTAID';
    protected $fillable = ['TIPONOTAID','CODIGO','DESCRIPCION','IDMODALIDAD','NOTA','PRIORIDAD','NOMCOLUMNA','LIBRETA','COD_REF','INSTANCIA','NOMLIBRETA'];

    public function modalidad(){
        return $this->belongsTo('\App\Modalidad','IDMODALIDAD');
      }

      public static function modalidads($IDMODALIDAD){
        return TipoNota::where('IDMODALIDAD','=',$IDMODALIDAD)
        ->get();
      }
}
