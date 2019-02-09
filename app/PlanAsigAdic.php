<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanAsigAdic extends Model
{
    protected $table = 'PLANASIGADIC';
	protected $primaryKey = 'IDPLANASIGADIC';
    protected $fillable =['IDPLANASIGADIC','ANO','ASIGNATURAID','DESCRIPCION'];
    public $timestamps = false;

    public function asignatura(){
        return $this->belongsTo('\App\Asignatura','ASIGNATURAID');
      }
}
