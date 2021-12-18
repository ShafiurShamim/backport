<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\ManageRouteServiceProvider;
use App\Http\Requests\Manage\Auth\AdminLoginRequest;

class ManageAdminLoginController extends ManageController
{
    /**
     * Display the manage login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('manage.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\ManageLoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AdminLoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect(ManageRouteServiceProvider::DASHBOARD);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('manage')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(ManageRouteServiceProvider::LOGIN);
    }
}
