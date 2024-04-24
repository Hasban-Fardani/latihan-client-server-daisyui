<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@webtech.id',
            'role' => 'admin'
        ]);

        User::factory()->create([
            'name' => 'Admin 2',
            'email' => 'admin2@webtech.id',
            'role' => 'admin'
        ]);
        
        User::factory(8)->create();

        $this->call([
            CategorySeeder::class,
            SparepartSeeder::class,
            CustomerSeeder::class,
            TransactionSeeder::class,
            TransactionDetailSeeder::class,
        ]);
    }
}
