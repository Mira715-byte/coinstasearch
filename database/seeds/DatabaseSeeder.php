<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $tables = [
        'users',
        'counties',
        'identities',
        'cities',
        'companies', 
        'domains',
        'users',
    ];


    public function run()
    {
        /*
        Model::unguard(); 

        DB::statement( 'SET FOREIGN_KEY_CHECKS=0' );
        
    
        $this->call(UsersTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
        $this->call(IdentitiesTableSeeder::class);
        $this->call(CountiesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(DomainsTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);

        foreach( $this->tables as $tableName ) {
            DB::table( $tableName )->truncate();
        }
        DB::statement( 'SET FOREIGN_KEY_CHECKS=1' );

        Model::reguard();       
        */

        Model::unguard();

        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        // Clear existing data
        DB::table('identities')->truncate();
        DB::table('domains')->truncate();
        DB::table('cities')->truncate();
        DB::table('counties')->truncate();
        DB::table('companies')->truncate();
        DB::table('users')->truncate();

        // Seed data
        /*
        $this->call(UsersTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
        $this->call(IdentitiesTableSeeder::class);
        $this->call(CountiesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(DomainsTableSeeder::class);
        */

        // IMPORTANT: întâi județe
    $this->call(CountiesTableSeeder::class);

    // apoi orașe
    $this->call(CitiesTableSeeder::class);

    // apoi utilizatori
    $this->call(UsersTableSeeder::class);

    // apoi firme, pentru că au nevoie de county_id și city_id
    $this->call(CompaniesTableSeeder::class);

    // apoi identities, pentru că au nevoie de user_id și company_id
    $this->call(IdentitiesTableSeeder::class);

    // domains
    $this->call(DomainsTableSeeder::class);

    $this->call(AdminsTableSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        Model::reguard();
        
    }

}
