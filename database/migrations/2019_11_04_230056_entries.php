<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Entries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entries', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->text('title')->nullable(false);
            $table->text('content')->nullable(false);
            $table->dateTime('created_at')->default(DB::raw('NOW()'));
            $table->dateTime('updated_at')->nullable(false);

            //FOREIGN KEYS
            $table->foreign('user_id')->references('id')->on('users');

            //INDEX
            $table->index('user_id');
            $table->index('created_at');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('entries', function (Blueprint $table) {
            //
        });
    }
}
