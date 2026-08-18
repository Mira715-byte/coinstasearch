<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query\Builder;

//use App\Search\Searchable;
use Laravel\Scout\Searchable;

class Company extends Model
{
    use Searchable;

    protected $table = 'companies'; 

    protected $fillable = [
        'company_name', 'CUI', 'no_reg', 'EUID', 'startdate', 'comments', 
        'OSIM', 'about', 'county_id', 'city_id', 'address', 'phone', 
        'mobile', 'fax', 'admins', 'web', 
        'CAEN', 'activity', 'activity_description'
    ];

    public function county()
    {
        return $this->belongsTo('App\County');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function domain()
    {
        return $this->belongsTo('App\Domain');
    }

    public function identity()
    {
        return $this->hasOne( 'App\Identity' );
    }

   public function toSearchableArray()
    {
        return [
            'county' => $this->county['county_name'],
            'city' => $this->city['city_name'],
            'domain' => $this->domain['domain_name'],
            'id' => $this->id, 
            'company_name' => $this->company_name, 
            'CUI' => $this->CUI,
            'no_reg' => $this->no_reg,
            'EUID' => $this->EUID,
            'startdate' => $this->startdate,
            'comments' => $this->comments,
            'OSIM' => $this->OSIM,
            'about' => $this->about,
            'county_id' => $this->county_id,
            'city_id' => $this->city_id,
            'address' => $this->address,
            'phone' => $this->phone,
            'mobile' => $this->mobile,
            'fax' => $this->fax,
            'admins' => $this->admins,
            'web' => $this->web,
            'CAEN' => $this->CAEN,
            'activity' => $this->activity,
            'activity_description' => $this->activity_description
            ];
        /*    
        $city_name = array_map(function($item) {
            return trim($item);
        }, explode(',', $this->city->city_name));

        return array_merge( $this->toArray(), ['city' => $this->city->city_name, 'city_name' => $city_name]);
        */
    
    }   

}
