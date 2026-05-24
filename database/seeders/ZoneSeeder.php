<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (DB::table('zones')->count() === 0) {
            DB::table('zones')->insert([
                'name' => 'Dhaka',
                'phone' => '01524635152',
                'location' => 'Zigatola',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
