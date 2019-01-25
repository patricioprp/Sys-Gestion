<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modalidad extends Model
{
    protected $table = 'MODALIDAD';
    protected $primaryKey = 'IDMODALIDAD';
    protected $fillable = ['IDMODALIDAD','IDTIPOMODALIDAD','EVALUACION','DESCRIPCION','ORDENMOD','HOJALIBRETA'];

    public function tipoNotas(){
        return $this->hasMany('\App\TipoNota','TIPONOTAID');
      }

    public function tipoModalidad(){
        return $this->belongsTo('\App\TipoModalidad','IDTIPOMODALIDAD');
      }

      public function configuraMods(){
        return $this->hasMany('\App\ConfiguraMod','IDCONFIGURAMOD');
      }

      public static function modalidad($idtipomodalidad){
        return Modalidad::where('IDTIPOMODALIDAD','=',$idtipomodalidad)
        ->get();
      }
}
