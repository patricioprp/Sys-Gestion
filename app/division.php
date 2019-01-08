<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class division extends Model
{
    protected $table = 'DIVISIONES';
	protected $primaryKey = 'IDDIVISION';
//	protected $fillable =['NOTA'];
	
	public function getRouteKeyName()
	{
	    return 'IDDIVISION';
	}
}
