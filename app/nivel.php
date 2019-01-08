<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nivel extends Model
{
    protected $table = 'NIVELES';
	protected $primaryKey = 'IDNIVEL';
//	protected $fillable =['NOTA'];
	
	public function getRouteKeyName()
	{
	    return 'IDNIVEL';
	}
}
