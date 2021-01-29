<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->integer('showfirst');
            $table->biginteger('smid');
            $table->biginteger('cid');
            $table->biginteger('smcaid');
            $table->integer('cityid');
            $table->integer('proid');
            $table->string('photo')->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('location')->nullable();
            $table->string('phone1')->nullable();
            $table->string('phone2')->nullable();
            $table->string('phone3')->nullable();
            $table->string('link')->nullable();
            $table->string('facebook')->nullable();
            $table->string('gmail')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('youtube')->nullable();
            $table->string('topleftword')->nullable();
            $table->string('bottomrightword')->nullable();
            $table->longtext('map')->nullable();
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
        Schema::dropIfExists('cards');
    }
}
