<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
   public function run(): void
{
    \App\Models\User::factory()->create([
        'name' => 'Admin Travel',
        'email' => 'admin@travel.com',
        'password' => bcrypt('password'),
        'role' => 'admin', // Pastikan kamu sudah tambah kolom role di tabel user
    ]);
}
}
