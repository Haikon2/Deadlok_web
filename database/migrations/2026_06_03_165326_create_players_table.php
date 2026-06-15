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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('username')->unique();
            $table->string('avatar_url')->nullable();
            $table->integer('level')->default(1);
            $table->integer('rank_points')->default(0);
            $table->integer('total_kills')->default(0);
            $table->integer('total_deaths')->default(0);
            $table->integer('total_matches')->default(0);
            $table->integer('total_wins')->default(0);
            $table->decimal('win_rate', 5, 2)->default(0.00);
            $table->dateTime('last_match_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
