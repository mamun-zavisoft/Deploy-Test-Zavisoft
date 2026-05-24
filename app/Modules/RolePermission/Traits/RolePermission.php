<?php

namespace App\Modules\RolePermission\Traits;

use Spatie\Permission\Traits\HasRoles;

trait RolePermission
{
    use HasRoles;

    /**
     * Assign a role to the user.
     *
     * @param  string|array|\Spatie\Permission\Models\Role  $role
     * @return void
     */
    public function assignRoleToUser($role)
    {
        $this->assignRole($role);
    }

    /**
     * Remove a role from the user.
     *
     * @param  string|array|\Spatie\Permission\Models\Role  $role
     * @return void
     */
    public function removeRoleFromUser($role)
    {
        $this->removeRole($role);
    }

    /**
     * Assign a permission to the user.
     *
     * @param  string|array|\Spatie\Permission\Models\Permission  $permission
     * @return void
     */
    public function assignPermissionToUser($permission)
    {
        $this->givePermissionTo($permission);
    }

    /**
     * Revoke a permission from the user.
     *
     * @param  string|array|\Spatie\Permission\Models\Permission  $permission
     * @return void
     */
    public function revokePermissionFromUser($permission)
    {
        $this->revokePermissionTo($permission);
    }

    /**
     * Check if a user has a specific permission.
     *
     * @param  string  $permission
     * @return bool
     */
    public function hasUserPermission($permission)
    {
        return $this->hasPermissionTo($permission);
    }

    /**
     * Assign permissions to a role.
     *
     * @param  string|array|\Spatie\Permission\Models\Permission  $permissions
     * @param  \Spatie\Permission\Models\Role  $role
     * @return void
     */
    public function assignPermissionsToRole($permissions, $role)
    {
        $role->givePermissionTo($permissions);
    }

    /**
     * Remove permissions from a role.
     *
     * @param  string|array|\Spatie\Permission\Models\Permission  $permissions
     * @param  \Spatie\Permission\Models\Role  $role
     * @return void
     */
    public function removePermissionsFromRole($permissions, $role)
    {
        $role->revokePermissionTo($permissions);
    }

    /**
     * Check if a role has a specific permission.
     *
     * @param  string  $permission
     * @param  \Spatie\Permission\Models\Role  $role
     * @return bool
     */
    public function roleHasPermission($permission, $role)
    {
        return $role->hasPermissionTo($permission);
    }
}
