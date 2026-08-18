<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\Relation;

//use App\Search\Searchable;
use Laravel\Scout\Searchable;

class Identity extends Authenticatable
{
    use Notifiable;
    use Searchable;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $guarded = [];
    public $timestamps = true;
    public static $rules = [
        'user_id'    => 'required',
        'company_id' => 'required',
        'email'      => 'required',
        'password'   => 'required'
    ];
    protected $fillable = ['user_id', 'company_id', 'email', 'password'];
    
    public function user()
    {
        return $this->belongsTo( 'App\User' );
    }

    public function company()
    {
        return $this->belongsTo( 'App\Company' );
    }

    public function admin()
    {
        return $this->belongsTo( 'App\Admin' );
    }


    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'company_id' => $this->company_id,
            'admin_id' => $this->admin_id,
            'firstname' => $this->user['firstname'],
            'lastname' => $this->user['lastname'],
            'company' => $this->company['company_name'],
            'admin' => $this->admin['name'],
        ];
    }

}
