<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::addNamespace('RolePermission', base_path('app/Modules/RolePermission/Views'));


        View::composer('*', function () {
            if (Auth::check()) {
                $user = Auth::user();

                // Use cache efficiently
                $userPermissions =  Cache::remember('user_permissions' . $user->id, now()->addMonths(5), function ()  use ($user) {
                    return $user->getAllPermissions()->pluck('name')->toArray();
                });

                
                Blade::if('permission', function ($permissions) use ($user, $userPermissions) {
                    // Always allow SUPER_ADMIN and IN_CHARGE
                    if (in_array($user->role, [User::$SUPER_ADMIN, User::$IN_CHARGE])) {
                        return true;
                    }

                    if (is_array($permissions)) {
                        return !empty(array_intersect($permissions, $userPermissions));
                    }

                    return in_array($permissions, $userPermissions);
                });

                Blade::directive('elsepermission', fn() => '<?php else: ?>');
            }
        });

        Paginator::useBootstrap('bootstrap-4');
    }
}
