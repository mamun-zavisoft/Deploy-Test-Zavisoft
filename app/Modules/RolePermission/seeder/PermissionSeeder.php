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
            ['guard_name' => 'admin', 'group_name' => 'dashboard', 'name' => 'cards'],
            ['guard_name' => 'admin', 'group_name' => 'dashboard', 'name' => 'chart'],

            ['guard_name' => 'admin', 'group_name' => 'order-payment', 'name' => 'order-payment-list'],
            ['guard_name' => 'admin', 'group_name' => 'order-payment', 'name' => 'order-payment-show'],
            ['guard_name' => 'admin', 'group_name' => 'order-payment', 'name' => 'order-payment-update'],

            ['guard_name' => 'admin', 'group_name' => 'order', 'name' => 'order-list'],
            ['guard_name' => 'admin', 'group_name' => 'order', 'name' => 'order-show'],

            ['guard_name' => 'admin', 'group_name' => 'shop-product', 'name' => 'shop-product-list'],
            ['guard_name' => 'admin', 'group_name' => 'shop-product', 'name' => 'shop-product-show'],

            ['guard_name' => 'admin', 'group_name' => 'product-request', 'name' => 'product-request-list'],
            ['guard_name' => 'admin', 'group_name' => 'product-request', 'name' => 'product-request-update'],
            ['guard_name' => 'admin', 'group_name' => 'product-request', 'name' => 'product-request-show'],

            ['guard_name' => 'admin', 'group_name' => 'merchant', 'name' => 'merchant-list'],
            ['guard_name' => 'admin', 'group_name' => 'merchant', 'name' => 'merchant-show'],
            ['guard_name' => 'admin', 'group_name' => 'merchant', 'name' => 'merchant-active'],
            ['guard_name' => 'admin', 'group_name' => 'merchant', 'name' => 'merchant-inactive'],

            ['guard_name' => 'admin', 'group_name' => 'prime-view', 'name' => 'prime-view-list'],
            ['guard_name' => 'admin', 'group_name' => 'prime-view', 'name' => 'prime-view-create'],
            ['guard_name' => 'admin', 'group_name' => 'prime-view', 'name' => 'prime-view-update'],
            ['guard_name' => 'admin', 'group_name' => 'prime-view', 'name' => 'prime-view-delete'],

            ['guard_name' => 'admin', 'group_name' => 'prime-view-product', 'name' => 'prime-view-product-list'],
            ['guard_name' => 'admin', 'group_name' => 'prime-view-product', 'name' => 'prime-view-product-create'],
            ['guard_name' => 'admin', 'group_name' => 'prime-view-product', 'name' => 'prime-view-product-delete'],

            ['guard_name' => 'admin', 'group_name' => 'location', 'name' => 'location-list'],
            ['guard_name' => 'admin', 'group_name' => 'location', 'name' => 'location-create'],
            ['guard_name' => 'admin', 'group_name' => 'location', 'name' => 'location-update'],

            ['guard_name' => 'admin', 'group_name' => 'reason', 'name' => 'reason-list'],
            ['guard_name' => 'admin', 'group_name' => 'reason', 'name' => 'reason-create'],
            ['guard_name' => 'admin', 'group_name' => 'reason', 'name' => 'reason-update'],
            ['guard_name' => 'admin', 'group_name' => 'reason', 'name' => 'reason-delete'],

            ['guard_name' => 'admin', 'group_name' => 'customer', 'name' => 'customer-list'],
            ['guard_name' => 'admin', 'group_name' => 'customer', 'name' => 'customer-show'],

            ['guard_name' => 'admin', 'group_name' => 'slider', 'name' => 'slider-create'],
            ['guard_name' => 'admin', 'group_name' => 'slider', 'name' => 'slider-update'],
            ['guard_name' => 'admin', 'group_name' => 'slider', 'name' => 'slider-delete'],
            ['guard_name' => 'admin', 'group_name' => 'slider', 'name' => 'slider-list'],

            ['guard_name' => 'admin', 'group_name' => 'category', 'name' => 'category-create'],
            ['guard_name' => 'admin', 'group_name' => 'category', 'name' => 'category-update'],
            ['guard_name' => 'admin', 'group_name' => 'category', 'name' => 'category-delete'],
            ['guard_name' => 'admin', 'group_name' => 'category', 'name' => 'category-list'],
            ['guard_name' => 'admin', 'group_name' => 'category', 'name' => 'category-IMPORT'],

            ['guard_name' => 'admin', 'group_name' => 'coupon-type', 'name' => 'coupon-type-create'],
            ['guard_name' => 'admin', 'group_name' => 'coupon-type', 'name' => 'coupon-type-update'],
            ['guard_name' => 'admin', 'group_name' => 'coupon-type', 'name' => 'coupon-type-delete'],
            ['guard_name' => 'admin', 'group_name' => 'coupon-type', 'name' => 'coupon-type-list'],

            ['guard_name' => 'admin', 'group_name' => 'coupon', 'name' => 'coupon-create'],
            ['guard_name' => 'admin', 'group_name' => 'coupon', 'name' => 'coupon-update'],
            ['guard_name' => 'admin', 'group_name' => 'coupon', 'name' => 'coupon-delete'],
            ['guard_name' => 'admin', 'group_name' => 'coupon', 'name' => 'coupon-list'],

            ['guard_name' => 'admin', 'group_name' => 'payout-request', 'name' => 'payout-request-list'],
            ['guard_name' => 'admin', 'group_name' => 'payout-request', 'name' => 'payout-request-show'],
            ['guard_name' => 'admin', 'group_name' => 'payout-request', 'name' => 'payout-request-update'],

            ['guard_name' => 'admin', 'group_name' => 'category-request', 'name' => 'category-request-list'],
            ['guard_name' => 'admin', 'group_name' => 'category-request', 'name' => 'category-request-update'],
            ['guard_name' => 'admin', 'group_name' => 'category-request', 'name' => 'category-request-delete'],

            ['guard_name' => 'admin', 'group_name' => 'help-request', 'name' => 'help-request-list'],
            ['guard_name' => 'admin', 'group_name' => 'help-request', 'name' => 'help-request-show'],
            ['guard_name' => 'admin', 'group_name' => 'help-request', 'name' => 'help-request-delete'],

            ['guard_name' => 'admin', 'group_name' => 'role', 'name' => 'role-list'],
            ['guard_name' => 'admin', 'group_name' => 'role', 'name' => 'role-create'],
            ['guard_name' => 'admin', 'group_name' => 'role', 'name' => 'role-update'],
            ['guard_name' => 'admin', 'group_name' => 'role', 'name' => 'role-delete'],

            ['guard_name' => 'admin', 'group_name' => 'user', 'name' => 'user-list'],
            ['guard_name' => 'admin', 'group_name' => 'user', 'name' => 'user-create'],
            ['guard_name' => 'admin', 'group_name' => 'user', 'name' => 'user-update'],
            ['guard_name' => 'admin', 'group_name' => 'user', 'name' => 'user-delete'],

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
