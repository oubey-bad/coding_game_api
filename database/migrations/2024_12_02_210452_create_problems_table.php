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
        Schema::create('problems', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->text('example_input');
            $table->text('example_output');
            $table->enum('difficulty', ['easy', 'medium', 'hard']);

            $table->enum('day_number', [1, 2]);
            $table->timestamps();
        });
       
        Schema::create('test_cases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('problem_id');
            $table->text('input')->nullable(); // Store potentially larger outputs
            $table->text('expected_output'); // Store potentially larger outputs
            $table->text('user_output')->nullable(); // Nullable in case the user hasn't submitted yet
            $table->string('error')->nullable(); // Nullable for no errors
            $table->unsignedInteger('points'); // Points should be an integer
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('problems');
    }
};
