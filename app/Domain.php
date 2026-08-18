<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Domain extends Model
{
    use Searchable;

    protected $table = 'domains'; 

    protected $fillable = [ 'domain_name' ];


	
	public function company()
	{
		return $this->hasOne( 'App\Company' );
	}

}
