<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllFacebookRESULTSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_facebook_RESULTS', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('firnr')->default(0);
            $table->string('fbid', 150);
            $table->string('lang', 5);            
            $table->integer('countryCode');
            $table->integer('sessionId');
            $table->integer('processed')->default(0);
            $table->string('statusCode', 10)->nullable();
            $table->index(['countryCode', 'sessionID']);
            $table->index('firnr');
            $table->index('processed');
            $table->unique(['fbid', 'countryCode', 'lang']);
        });
        
        \DB::statement("ALTER TABLE all_facebook_RESULTS ADD data LONGBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('all_facebook_RESULTS');
    }
}
