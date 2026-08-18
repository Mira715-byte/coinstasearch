<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');

            $table->integer( 'county_id' )->unsigned()->index()->nullable();
            $table->foreign( 'county_id' )->references( 'id' )->on( 'counties' )->onDelete( 'cascade' );

            $table->integer( 'city_id' )->unsigned()->index()->nullable();
            $table->foreign( 'city_id' )->references( 'id' )->on( 'cities' )->onDelete( 'cascade' );

            $table->string('company_name');
            $table->string('CUI', 20);
            $table->string('no_reg', 20);
            $table->string('EUID', 20);
            $table->string('startdate', 20);
            $table->text('comments');
            $table->string('OSIM', 20);
            
            $table->text('about');
            $table->string('address', 100);
            $table->string('phone', 30);
            $table->string('mobile', 30);
            $table->string('fax', 30);
            $table->string('admins', 50);
            $table->string('web');
            $table->string('CAEN', 30);
            $table->string('activity');
            $table->text('activity_description');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
