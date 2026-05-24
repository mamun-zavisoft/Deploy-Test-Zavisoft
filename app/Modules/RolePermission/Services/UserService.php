<?php

namespace App\Modules\RolePermission\Services;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function getAdmins($request)
    {
        $perPage = $request->input('perPage', 10);
        $page = $request->input('page', 1);
        $search = $request->input('search', '');
        $role = UserRole::SHOP_ADMIN->value;
        $users = User::where('role', $role)
            ->with('permissions')
            ->when($search, function ($query) use ($search) {
                $query->whereAny(['name', 'email', 'phone'], 'like', "%{$search}%");
            })
            ->paginate($perPage, ['*'], 'page', $page)->withQueryString();

        return $users;
    }

    public function createAdmin($data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            'role' => UserRole::SHOP_ADMIN->value,
        ]);
        if (isset($data['avatar']) && ! empty($data['avatar'])) {
            $user->avatar = $data['avatar'];
        }
        $role = intval($data['role_id']);
        if ($user) {
            $user->assignRoleToUser($role);
        }

        if (isset($data['permissions'])) {
            $user->syncPermissions($data['permissions']);
        }

        return $user->save();
    }

    public function getAdminById($id)
    {
        return User::find($id);
    }

    public function updateAdmin($data, $id)
    {

        $user = $this->getAdminById($id);
        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
        ]);
        if (isset($data['avatar']) && ! empty($data['avatar'])) {
            $user->avatar = $data['avatar'];
        }
        $role = intval($data['role_id']);
        if ($user) {
            $user->syncRoles($role);
        }

        if (isset($data['permissions'])) {
            $user->permissions()->detach();
            $user->assignPermissionToUser($data['permissions']);
        } else {
            $user->permissions()->detach();
        }
        Cache::forget('user_permissions'.$user->id);

        return $user->save();
    }

    public function deleteAdmin($id)
    {
        $user = $this->getAdminById($id);

        return $user->delete();
    }
}
