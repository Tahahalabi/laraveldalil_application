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
            $table->id('cards_id');
            $table->integer('cards_showfirst');
            $table->biginteger('cards_smid');
            $table->biginteger('cards_cid');
            $table->biginteger('cards_smcaid');
            $table->integer('cards_cityid');
            $table->integer('cards_proid');
            $table->string('cards_photo')->nullable();
            $table->string('cards_title')->nullable();
            $table->string('cards_description')->nullable();
            $table->string('cards_location')->nullable();
            $table->string('cards_phone1')->nullable();
            $table->string('cards_phone2')->nullable();
            $table->string('cards_phone3')->nullable();
            $table->string('cards_link')->nullable();
            $table->string('cards_facebook')->nullable();
            $table->string('cards_gmail')->nullable();
            $table->string('cards_instagram')->nullable();
            $table->string('cards_twitter')->nullable();
            $table->string('cards_youtube')->nullable();
            $table->string('cards_topleftword')->nullable();
            $table->string('cards_bottomrightword')->nullable();
            $table->longtext('cards_map')->nullable();
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
