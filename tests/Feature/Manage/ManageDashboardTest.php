<?php

namespace Tests\Feature\Manage;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageDashboardTest extends TestCase
{
    use RefreshDatabase;
   
    public function test_only_admin_users_can_see_manage_dashboard()
    {
        $this->AdminSignIn('super');

        $this->get('/manage/dashboard')->assertStatus(200);
    }

    public function test_other_users_cannot_see_manage_dashboard()
    {
        $this->SignIn();

        //normal user can see their dashboard
        $this->get('/dashboard')->assertStatus(200);
        //normal user can not see manage dashboard
        $this->get('/manage/dashboard')->assertStatus(302);
    }
}
