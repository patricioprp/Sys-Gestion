<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nota extends Model
{
	protected $table = 'NOTAS';
	protected $primaryKey = 'NOTAID';
	protected $fillable =['NOTA'];
	
	public function getRouteKeyName()
	{
	    return 'NOTAID';
	}
}
