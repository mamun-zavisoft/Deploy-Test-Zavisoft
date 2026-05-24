### Steps to Set Up `RolePermission` Module

1. **Copy `RolePermission` Folder**
   - Copy `RolePermission` from `app/Modules` into your project's `app/Modules`.

2. **Update `routes/web.php`**
   ```php
   include base_path('app/Modules/RolePermission/Routes/web.php');
   ```

3. **Update `AppServiceProvider.php`**
   ```php
   use Illuminate\Support\Facades\View;
   use Illuminate\Support\Facades\Blade;
   use Illuminate\Support\Facades\Auth;

   public function boot()
   {
       View::addNamespace('RolePermission', base_path('app/Modules/RolePermission/Views'));

       Blade::if('permission', function ($permissions) {
           if (is_array($permissions)) {
               foreach ($permissions as $permission) {
                   if (Auth::check() && Auth::user()->hasPermission($permission)) return true;
               }
           }
           return Auth::check() && Auth::user()->hasPermission($permissions);
       });

       Blade::directive('elsepermission', function () {
           return '<?php else: ?>';
       });
   }
   ```

4. **Install Spatie Laravel-Permission**
   - Follow [Spatie Laravel-Permission Docs](https://spatie.be/docs/laravel-permission/v6/installation-laravel).

5. **Add `group_name` Column to `permissions` Table**
   ```php
   Schema::table('permissions', function (Blueprint $table) {
       $table->string('group_name')->after('name');
   });
   ```
   - Run migration:
     ```bash
     php artisan migrate
     ```

6. **Copy and Run `PermissionSeeder`**
   - Copy `PermissionSeeder` to `database/seeders/PermissionSeeder.php`.
   - Seed permissions:
     ```bash
     php artisan db:seed --class=PermissionSeeder
     ```

7. **Update `users` Table**
   - Modify columns/logic in the `users` table as needed.

8. **Use `RolePermission` Trait in `User` Model**
   ```php
   use App\Modules\RolePermission\Traits\RolePermission;

   class User extends Authenticatable
   {
       use RolePermission;
   }
   ```

9. **Set `guard_name` in `User` Model**
   ```php
   protected $guard_name = 'admin';
   ```

10. **Add `hasPermission` Method to `User` Model**
    ```php
    use Illuminate\Support\Facades\Cache;

    public function hasPermission($permissionName)
    {
        $permissions = Cache::remember('user_permissions'.$this->id, now()->addMonths(5), function () {
            return $this->getAllPermissions()->pluck('name')->toArray();
        });
        return in_array($permissionName, $permissions);
    }
    ```

11. **Copy and Register `PermissionCheck` Middleware**
    - Protect methods in controllers:
      ```php
      public function __construct()
      {
          $this->middleware('permission:role-list')->only('index');
          $this->middleware('permission:role-create')->only(['create', 'store']);
          $this->middleware('permission:role-update')->only(['edit', 'update']);
          $this->middleware('permission:role-delete')->only('destroy');
      }
      ```

12. **Protect Views with `@permission`**
    ```php
    @permission('role-create')
       <a href="{{ route('roles.create') }}">Add new</a>
    @endpermission
    ```

You're done! The `RolePermission` module is set up.