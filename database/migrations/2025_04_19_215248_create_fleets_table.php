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
        Schema::create('fleets', function (Blueprint $table) {
            $table->id();

            $table->string('name', 255);

            $table->text('description');

            $table->integer('maximum_passenger');

            $table->integer('miles');

            $table->string('image')->nullable();

            $table->enum('category', [
                'light',
                'mid',
                'super',
                'heavy',
                'long_range',
                'commercial',
                'turboprop',
            ]);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fleets');
    }
};
