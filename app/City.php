<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\Search\Searchable;
use Laravel\Scout\Searchable;
      
class City extends Model
{
    use Searchable;

    protected $table = 'cities'; 

    protected $fillable = [ 'city_name', 'county_id' ];

  
    public function county() {
    	return $this->belongsTo( 'App\County' );
    }

    public function company()
    {
        return $this->hasOne( 'App\Company' );
    }
}

