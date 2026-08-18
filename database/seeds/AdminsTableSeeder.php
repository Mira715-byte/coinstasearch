<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('admins')->truncate();
        //factory(App\Admin::class, 2)->create(); DB::statement('SET FOREIGN_KEY_CHECKS=0');

     DB::statement('SET FOREIGN_KEY_CHECKS=0');
    DB::table('users')->truncate();

    DB::statement('SET FOREIGN_KEY_CHECKS=1');

    factory(App\User::class, 3)->create();
    }
}
