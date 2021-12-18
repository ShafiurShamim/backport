<?php

namespace App\Http\Controllers\Manage;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class ManageRoleController extends ManageController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manage.roles.index')->with(['roles' => Role::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.roles.create')->with(
            ['permissions' => Permission::all()->groupBy('table_name')]
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
            'name' => 'required|regex:/^[a-zA-Z_. ]*$/|max:255|min:2|unique:roles',
        ]);

        $role = new Role;
        $role->name = $request->name;
        $role->display_name = $request->display_name;

        $role->save();
        if ($request->permissions) {
            $role->permissions()->sync($request->permissions, false);
        }
        return redirect()->route('manage.roles.show', $role->id)->with('success', trans('msg.created', ['attr' => 'Role']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("manage.roles.show")->with(
            [
                'role'=> Role::findOrFail($id),
                'permissions'=> Permission::all()->groupBy('table_name')
            ]
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
        return view("manage.roles.edit")->with(
            [
                'role'=> Role::findOrFail($id),
                'permissions'=> Permission::all()->groupBy('table_name')
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
        $role = Role::findOrFail($id);
        $this->validate($request, [
            'name' => 'required|alpha_dash|max:255|min:2|unique:roles,name,' . $role->id,
            // 'display_name' => 'regex:/^[a-zA-Z_.\s]*$/|',
        ]);
        

        $role->name = $request->name;
        $role->display_name = $request->display_name;

        $role->update();
        if ($request->permissions) {
            $role->permissions()->sync($request->permissions, true);
        } else {
            $role->permissions()->sync(null, true);
        }
        return redirect()->route('manage.roles.show', $role->id)->with('success', 'Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($role = Role::find($id)) {
            if ($role->manageUsers->count() === 0) {
                $role->delete();
                return redirect()->route('manage.roles.index')->with('success', 'Role Deleted');
            }
            return redirect()->route('manage.roles.index')->with('error', "It has active user");
        }
        return redirect()->route('manage.roles.index')->with('error', "Role not found");
    }
}
