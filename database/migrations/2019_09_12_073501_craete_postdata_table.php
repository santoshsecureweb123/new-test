<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CraetePostdataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postdata', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreign('post_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('post_title');
            $table->string('post_description');
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
        Schema::dropIfExists('postdata');
    }
}
