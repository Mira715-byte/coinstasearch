<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdentitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'identities', function ( Blueprint $table ) {
            $table->increments( 'id' );
            
            $table->string( 'email', 100 )->unique();
            $table->string( 'password', 100 );
            $table->string('remember_token', 100)->nullable();

            $table->integer( 'company_id' )->unsigned()->index()->nullable();
            $table->foreign( 'company_id' )->references( 'id' )->on( 'companies' )->onDelete( 'cascade' );

            $table->integer( 'user_id' )->unsigned()->index()->nullable();
            $table->foreign( 'user_id' )->references( 'id' )->on( 'users' )->onDelete( 'cascade' );

            $table->integer( 'admin_id' )->unsigned()->index()->nullable();
            $table->foreign( 'admin_id' )->references( 'id' )->on( 'admins' )->onDelete( 'cascade' );
        
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement( 'SET FOREIGN_KEY_CHECKS = 0' );
        DB::table('identities')->truncate();
        Schema::dropIfExists( 'identities' );
        DB::statement( 'SET FOREIGN_KEY_CHECKS = 1' );
    }
}
