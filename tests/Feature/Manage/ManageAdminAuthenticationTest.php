<?php

namespace Tests\Feature\Manage;

use App\Models\Admin;
use App\Providers\ManageRouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageAdminAuthenticationTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_admin_users_login_screen_can_be_rendered()
    {
        $response = $this->get(ManageRouteServiceProvider::LOGIN);
        
        $response->assertStatus(200);
    }

    public function test_admin_users_can_authenticate_using_the_login_screen()
    {
        $manage = Admin::factory()->create();
        $response = $this->post(ManageRouteServiceProvider::LOGIN, [
            'email' => $manage->email,
            'password' => 'testPASS',
        ]);
        $this->assertAuthenticated('manage');
        $response->assertRedirect(ManageRouteServiceProvider::DASHBOARD);
    }

    
    public function test_manage_users_can_not_authenticate_with_invalid_password()
    {
        $user = Admin::factory()->create();

        $response = $this->post(ManageRouteServiceProvider::LOGIN, [
                        'email' => $user->email,
                        'password' => 'wrong-password',
                    ]);
        $this->assertGuest('manage');

        $response->assertStatus(302);
    }
}
