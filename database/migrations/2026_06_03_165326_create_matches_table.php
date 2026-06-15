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
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->string('map')->default('Default Map');
            $table->enum('status', ['pending', 'live', 'finished', 'cancelled'])->default('pending');
            $table->enum('mode', ['1v1', '2v2', '3v3', '4v4', '5v5'])->default('5v5');
            $table->integer('team_a_score')->default(0);
            $table->integer('team_b_score')->default(0);
            $table->dateTime('started_at')->nullable();
            $table->dateTime('ended_at')->nullable();
            $table->integer('duration_seconds')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matches');
    }
};
