<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('cities')->truncate();
        /*DB::statement('SET FOREIGN_KEY_CHECKS=0');

DB::table('companies')->truncate();

DB::statement('SET FOREIGN_KEY_CHECKS=1');
        factory(App\City::class, 150)->create();
        */

        /*
          DB::statement('SET FOREIGN_KEY_CHECKS=0');

    DB::table('identities')->truncate();
    DB::table('companies')->truncate();

    DB::statement('SET FOREIGN_KEY_CHECKS=1');

    factory(App\Company::class, 500)->create();

    */

    DB::statement('SET FOREIGN_KEY_CHECKS=0');

        DB::table('cities')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        factory(App\City::class, 150)->create();
    }
}
