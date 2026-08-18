<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\Search\Searchable;
use Laravel\Scout\Searchable;
class County extends Model
{
    use Searchable;

    protected $table = 'counties'; 

    protected $fillable = [ 'county_name' ];


	
	public function company()
	{
		return $this->hasOne( 'App\Company' );
	}


	public function city()
	{
		return $this->hasOne( 'App\City' );
	}

}
