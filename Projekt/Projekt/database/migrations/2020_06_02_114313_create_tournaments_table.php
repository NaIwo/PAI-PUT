<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTournamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournaments', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();;
            $table->string('discipline');
            $table->foreignId('owner')->references('id')->on('users')->cascadeOnDelete();
            $table->timestamp('time');
            $table->string('location');
            $table->string('latitude');
            $table->string('longitude');
            $table->unsignedSmallInteger('participation_limit');
            $table->timestamp('end_time');
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
        Schema::dropIfExists('tournaments');
    }
}
