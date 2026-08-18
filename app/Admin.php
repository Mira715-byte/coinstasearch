<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
		'name',
	];
	protected $table = 'admins';
	public $timestamps = true;
	
	public function identity()
	{
		return $this->hasOne( 'Identity' )->first();
	}
}
