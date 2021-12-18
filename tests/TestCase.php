<?php

namespace Tests;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function AdminSignIn($role)
    {
        Artisan::call('db:seed', ['--class' => 'AdminTablesSeeder']);

        $admin = Admin::whereHas('roles', function ($query) use ($role) {
            $query->where('name', $role);
        })->first();
    
        $this->actingAs($admin, 'manage');

        return $this;
    }
    protected function SignIn($user = null)
    {
        $user = $user ?: User::factory()->create();

        $this->actingAs($user);

        return $this;
    }
}
