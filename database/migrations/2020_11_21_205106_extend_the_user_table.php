<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ExtendTheUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
          $table->string('phone', 20)->nullable();;
          $table->string('apartment_number', 10)->nullable();;
          $table->string('building_number', 10)->nullable();;
          $table->string('street', 255)->nullable();;
          $table->string('zip_code', 255)->nullable();;
          $table->string('city', 255)->nullable();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
