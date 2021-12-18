<?php

namespace App\Http\Traits\Manage;

use Illuminate\Support\Facades\Auth;

trait AdminUser
{
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'admin_role', 'admin_id', 'role_id');
    }

    public function permissions()
    {
        return $this->belongsToMany(
            'App\Models\Permission',
            'permission_role',
            'role_id',
            'permission_id'
        );
    }


    public function hasRole($name)
    {
        $name = $this->standardValue($name);
        if (is_array($name)) {
            return null !== $this->roles()->whereIn('name', $name)->first();
        }
        return null !== $this->roles()->where('name', $name)->first();
    }


    public function getRolePermissions()
    {
        return $this->roles()->first()->permissions()->get();
    }

    public function hasPermission($keys)
    {
        // $keys = $this->standardValue($keys);
        // if (is_array($keys)) {
        //     return null !== $this->permissions()->whereIn('key', $keys)->first();
        // }
        return null !== $this->getRolePermissions()->where('key', $keys)->first();
    }

    public function permissionKeys()
    {
        return $this->permissions()->pluck('key')->toArray();
    }


    /**
     * Checks if the string passed contains a pipe '|' and explodes the string to an array.
     * @param  string|array  $value
     * @return string|array
     */
    private function standardValue($value)
    {
        if (is_array($value) || strpos($value, '|') === false) {
            return $value;
        }
        return explode('|', $value);
    }
}
