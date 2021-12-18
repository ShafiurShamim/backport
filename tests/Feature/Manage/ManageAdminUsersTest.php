<?php

namespace Tests\Feature\Manage;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageAdminUsersTest extends TestCase
{
    use RefreshDatabase;
   
    public function test_only_permitted_users_can_see_all_admin_users()
    {
        $this->AdminSignIn('super');

        $response = $this->get('/manage/admins');

        $response->assertStatus(200);
        
        // dd(Auth::user()->email);
    }
}
