<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (app()->environment('local')) {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            Permission::truncate();
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }

        $permissions = [
            ['guard_name' => 'admin', 'group_name' => 'role', 'name' => 'role-list'],
            ['guard_name' => 'admin', 'group_name' => 'role', 'name' => 'role-create'],
            ['guard_name' => 'admin', 'group_name' => 'role', 'name' => 'role-update'],
            ['guard_name' => 'admin', 'group_name' => 'role', 'name' => 'role-delete'],
            
            ['guard_name' => 'admin', 'group_name' => 'user', 'name' => 'user-list'],
            ['guard_name' => 'admin', 'group_name' => 'user', 'name' => 'user-create'],
            ['guard_name' => 'admin', 'group_name' => 'user', 'name' => 'user-update'],
            ['guard_name' => 'admin', 'group_name' => 'user', 'name' => 'user-delete'],

            ['guard_name' => 'admin', 'group_name' => 'product', 'name' => 'product-list'],
            ['guard_name' => 'admin', 'group_name' => 'product', 'name' => 'product-create'],
            ['guard_name' => 'admin', 'group_name' => 'product', 'name' => 'product-update'],
            ['guard_name' => 'admin', 'group_name' => 'product', 'name' => 'product-delete'],
            
        ];

        $newPermissions = [];

        foreach ($permissions as $permission) {
            // Check if the name already exists
            $exists = DB::table('permissions')->where('name', $permission['name'])->exists();

            if (! $exists) {
                $newPermissions[] = $permission;
                $this->command->info('Inserted: '.$permission['name']);
            } else {
                $this->command->info('The key already exists: '.$permission['name']);
            }
        }

        DB::table('permissions')->insert($newPermissions);
    }
}
