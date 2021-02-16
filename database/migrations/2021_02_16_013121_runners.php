<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class Runners extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('person', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->bigInteger('cpf');
            $table->date('birth_date');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });

        Schema::create('type_race', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('distance');            
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });

        Schema::create('race', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->unsignedInteger('type_id');
            $table->foreign('type_id')->references('id')->on('type_race');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });

        Schema::create('person_race', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('race_id');
            $table->unsignedInteger('person_id');
            $table->foreign('person_id')->references('id')->on('person');
            $table->foreign('race_id')->references('id')->on('race');
            //updated when person started the race
            $table->timestamp('start')->nullable()->default(null);
            //updated when person finish the race
            $table->timestamp('end')->nullable()->default(null);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_race');
        Schema::dropIfExists('person_race');
        Schema::dropIfExists('race');
        Schema::dropIfExists('person');
        
    }
}