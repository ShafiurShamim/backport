<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;

class ManageDashboardController extends ManageController
{
    public function __construct()
    {
        $this->middleware('auth:manage');
    }
    /**
     * Show the manage dashboard page
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        return view('manage.dashboard');
    }
}
