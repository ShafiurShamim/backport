<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Models\Admin as AdminUser;
use App\Models\Role;

class ManageAdminUserController extends ManageController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manage.admins.index')->with(
            ['manageAdminUsers' =>  AdminUser::with('roles')->get()]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.admins.create')->with(
            ['roles' => Role::get()->pluck('name', 'id')->toArray()]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255|min:5',
            'email' => 'required|string|email|max:255|unique:admins',
        ]);
        
        if (!empty($request->password)) {
            $password = trim($request->password);
        } else {
            $password = 12345678;
        }


        $adminUser = new AdminUser;

        $adminUser->name = $request->name;
        $adminUser->login = uniqid(strstr($request->email, '@', true) . '-');
        $adminUser->email = $request->email;
        $adminUser->password = bcrypt($password);
        $adminUser->api_token = bin2hex(openssl_random_pseudo_bytes(30));
        $adminUser->display_name = $request->display_name;
        $adminUser->status = 1;
        $adminUser->save();

        if ($request->role) {
            $adminUser->roles()->sync($request->role, false);
        }
        // mailable job
        return redirect()->route('manage.admins.show', $adminUser->id)->with('success', 'Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("manage.admins.show")->with(
            ['adminUser' => AdminUser::findOrFail($id)]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("manage.admins.edit")->with(
            [
                'adminUser' => AdminUser::findOrFail($id),
                'roles'      => Role::get()->pluck('name', 'id')->toArray()
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $adminUser = AdminUser::findOrFail($id);
        $this->validate($request, [
           'display_name' => 'string|max:100'
        ]);
        if (!empty($request->new_password)) {
            $this->validate($request, [
                'new_password' => 'string|min:8'
             ]);
            $adminUser->password = bcrypt(trim($request->new_password));
        }
        $adminUser->display_name = trim($request->display_name);
        $adminUser->update();
    
        $role = (int) $request->roles;
        if ($role) {
            $adminUser->roles()->sync($request->roles, true);
        }
        return redirect()->route('manage.admins.show', $adminUser->id)->with('success', 'Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($admin = AdminUser::find($id)) {
            if ($admin->login === 'super') {
                return redirect()->route('manage.admins.index')->with('warn', 'Critical Issue');
            }
            $admin->delete();
            $admin->roles()->detach();
            return redirect()->route('manage.admins.index')->with('success', 'Deleted');
        }
        return redirect()->route('manage.admins.index')->with('error', "User not found");
    }
}
