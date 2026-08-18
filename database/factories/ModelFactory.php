<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator;


$factory->define(App\Identity::class, function (Generator $faker) {
    static $password;

        $userIds = App\User::pluck( 'id' )->toArray();
        $companyIds = App\Company::pluck( 'id' )->toArray();
    return [

   
        'user_id' => $faker->randomElement( $userIds ),
        'company_id'  => $faker->randomElement( $companyIds ),
        'email' => $faker->unique()->safeEmail,
        'password' => password_hash( 'password', PASSWORD_DEFAULT ),
    ];
});

$factory->define(App\User::class, function (Generator $faker) {
    
    return [
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
    ];
});

$factory->define(App\Company::class, function (Generator $faker) {
  
   $countyIds = App\County::pluck( 'id' )->toArray();
   $cityIds = App\City::pluck( 'id' )->toArray();
    return [
        
        'county_id' => $faker->randomElement( $countyIds ),
        'city_id' => $faker->randomElement( $cityIds ),

        'company_name' => $faker->company,
        'CUI' => $faker->numerify('CUI ########'),
        'no_reg' => $faker->numerify('############'),
        'EUID' => $faker->numerify('ROONRC ############'),
        'startdate' => $faker->date,
        'comments' => $faker->text,
        'OSIM' => $faker->word,
        'about' => $faker->text,

        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'mobile' => $faker->phoneNumber,
        'fax' => $faker->phoneNumber,
        'admins' => $faker->name,

        'web' => $faker->url,

        'CAEN' => $faker->numerify('####'),
        'activity' => $faker->sentence,
        'activity_description' => $faker->text,


    ];
});


$factory->define(App\County::class, function (Generator $faker) {

   return [
        'county_name' => $faker->city
     
    ];
        
});

$factory->define(App\City::class, function (Generator $faker) {

   $countyIds = App\County::pluck( 'id' )->toArray();
   return [
        'city_name' => $faker->city,
        'county_id' => $faker->randomElement( $countyIds ),
     
    ];
        
});

$factory->define(App\Domain::class, function (Generator $faker) {

   return [
        'domain_name' => $faker->word
     
    ];
        
});

$factory->define(App\Admin::class, function (Generator $faker) {

   return [
        'name' => $faker->name
     
    ];
        
});



