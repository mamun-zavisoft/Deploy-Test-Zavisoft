<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ZoneSeeder::class);

        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $users = [];
        // $password = \Hash::make('12345678');
        // $createdAt = now();
        // $updatedAt = now();
        // for($i = 0; $i < 1000000; $i++) {
        //     $users[] = [
        //         'name' => 'User ' . $i,
        //         'email' => 'user' . $i . '@example.com',
        //         'phone' => '0000'. $i,
        //         'password' => $password,
        //         'created_at' => $createdAt,
        //         'updated_at' => $updatedAt
        //     ];

        //     if (count($users) === 10000) {
        //         User::insert($users);
        //         $users = [];
        //         $this->command->info('Inserted ' . $i+1 . ' users');
        //     }
        // }
    }
}
