<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            $table->string('name');

            $table->string('email');

            $table->string('phone');

            $table->string('from');

            $table->string('destination');

            $table->date('date');

            $table->dateTime('time');

            $table->integer('number_of_passengers');

            $table->foreignId('requested_fleet');

            $table->enum('return_or_one_way', ['return', 'one_way']);

            $table->timestamps();

            $table
                ->foreign('requested_fleet')
                ->references('id')
                ->on('fleets')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
