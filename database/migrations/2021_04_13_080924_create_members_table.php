<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table-> string('name');
            $table-> string('surname');
            $table-> string('city');
            $table-> integer('experience');
            $table-> integer('year');
            $table-> text('notes')->nullable();
            $table-> unsignedBigInteger('reservoir_id');
            $table->foreign('reservoir_id')->references('id')->on('reservoirs');
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
        Schema::dropIfExists('members');
    }
}
