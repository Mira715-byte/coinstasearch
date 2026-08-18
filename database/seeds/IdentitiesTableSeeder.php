<?php

use Illuminate\Database\Seeder;

class IdentitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('identities')->truncate();
        factory(App\Identity::class, 500)->create();
    }
}
