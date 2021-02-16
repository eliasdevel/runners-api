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
            $table->string('name');
            $table->bigInteger('cpf');
            $table->date('birth_date');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });

        Schema::create('race', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });

        Schema::create('type_race', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('distance');
            $table->unsignedInteger('race_id');
            $table->foreign('race_id')->references('id')->on('race');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });

        Schema::create('person_race', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('type_race_id');
            $table->unsignedInteger('person_id');
            $table->foreign('person_id')->references('id')->on('person');
            $table->foreign('type_race_id')->references('id')->on('type_race');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });

        Schema::create('result', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('race_id');
            $table->unsignedInteger('person_id');
            $table->foreign('race_id')->references('id')->on('race');
            $table->foreign('person_id')->references('id')->on('person');
            $table->timestamp('start')->nullable()->default(null);
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
        Schema::dropIfExists('result');
    }
}