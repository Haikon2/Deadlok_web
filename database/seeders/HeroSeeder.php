<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('heroes')->insert([
            [
                'name' => 'Drifter',
                'slug' => 'drifter',
                'description' => 'A fast-moving attacker with high mobility',
                'role' => 'Attacker',
                'health' => 85,
                'speed' => 10,
                'attack_power' => 12.5,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Infernus',
                'slug' => 'infernus',
                'description' => 'A powerful fire-based attacker',
                'role' => 'Attacker',
                'health' => 100,
                'speed' => 7,
                'attack_power' => 14.0,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mirage',
                'slug' => 'mirage',
                'description' => 'A shadowy controller with illusions',
                'role' => 'Controller',
                'health' => 75,
                'speed' => 8,
                'attack_power' => 9.5,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Wraith',
                'slug' => 'wraith',
                'description' => 'A ghostly defender protecting allies',
                'role' => 'Defender',
                'health' => 120,
                'speed' => 6,
                'attack_power' => 8.0,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Venom',
                'slug' => 'venom',
                'description' => 'A toxic attacker with poison abilities',
                'role' => 'Attacker',
                'health' => 90,
                'speed' => 9,
                'attack_power' => 11.0,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

