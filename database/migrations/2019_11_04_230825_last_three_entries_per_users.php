<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LastThreeEntriesPerUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('last_three_entries_per_users', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->unsignedBigInteger('entry_id')->nullable(false);
            $table->dateTime('created_at')->default(DB::raw('NOW()'));
            $table->dateTime('updated_at')->nullable(false);

            //FOREIGN KEYS
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('entry_id')->references('id')->on('entries');

            //INDEX
            $table->index(['user_id', 'entry_id']);
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
        Schema::table('last_three_entries_per_users', function (Blueprint $table) {
            //
        });
    }
}
