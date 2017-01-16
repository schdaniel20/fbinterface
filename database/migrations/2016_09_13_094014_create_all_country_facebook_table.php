<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllCountryFacebookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_country_facebook', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url', 1000);
            $table->integer('crw_fir_nr')->default(0);
            $table->string('socialID', 50)->nullable();
            $table->string('lang', 5);
            $table->integer('country_code');
            $table->integer('sessionId');
            $table->integer('processed')->default(0);
            $table->integer('startedBy')->nullable();
            $table->dateTime('extractDate')->nullable();
            $table->index(['sessionId']);
            $table->index(['processed']);            
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('all_country_facebook');
    }
}
