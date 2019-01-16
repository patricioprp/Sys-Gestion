<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nota extends Model
{
	protected $table = 'NOTAS';
	protected $primaryKey = 'NOTAID';
    protected $fillable =['NOTA'];
    public $timestamps = false;

	public function getRouteKeyName()
	{
	    return 'NOTAID';
	}
}
