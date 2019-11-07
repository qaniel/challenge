<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HiddenTweets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hidden_tweets', function(Blueprint $table){
            $table->bigIncrements('id')->unique();
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->string('tweet_id',60)->nullable(false);
            $table->timestamps();

            //FOREIGN KEYS
            $table->foreign('user_id')->references('id')->on('users');

            //INDEX
            $table->index('user_id');
            $table->index('tweet_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
