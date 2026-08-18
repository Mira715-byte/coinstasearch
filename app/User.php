<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//use App\Search\Searchable;
use Laravel\Scout\Searchable;

class User extends Model
{
    use Searchable;
    protected $fillable = ['firstname', 'lastname'];
	protected $table = 'users';
	public $timestamps = true;
	
	public function identity()
	{
		return $this->hasOne( 'App\Identity' );
	}
}


