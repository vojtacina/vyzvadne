<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoneChallengesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('done_challenges', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('secret_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('nickname');
            $table->string('story',2000);
            $table->string('media_url')->nullable();
            $table->string('contact_line')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('done_challenges');
    }
}
