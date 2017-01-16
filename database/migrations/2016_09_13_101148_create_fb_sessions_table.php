<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFbSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fb_sessions', function (Blueprint $table) {
            $table->increments('sessionId');
            $table->string('sessionName', 100);
            $table->integer('country_code');
            $table->integer('status');
            $table->datetime('start_date')->nullable();
            $table->datetime('end_date')->nullable();
            $table->integer('createdBy');
            $table->datetime('createdAt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fb_sessions');
    }
}
