<?php

namespace App\Http\Controllers\Manage;

use App\Http\Traits\Manage\DBManager;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManagePermissionController extends ManageController
{
    use DBManager;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $p = Permission::get()->groupBy('table_name');

        return view('manage.permissions.index')->with(
            [
                // 'permissions' => Permission::all(),
                'permissions_keys' => Permission::PERMISSION_TYPES,
                'permission_exits' => Permission::all()->pluck('key')->toArray(),
                'tables'      => $this->listTables()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('manage.permissions.create')->with(
        //     [
        //         'permissions_keys' => Permission::PERMISSION_TYPES,
        //         'permission_exits' => Permission::all()->pluck('key')->toArray(),
        //         'tables'      => $this->listTables()
        //     ]
        // );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('manage.permissions.edit')->with([
            'table_name' => $id,
            'permissions_keys' => Permission::PERMISSION_TYPES,
            'permission_exits' => Permission::all()->pluck('key')->toArray(),
        ]);
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
        foreach (Permission::PERMISSION_TYPES as $perm) {
            //
            $table_key = $perm . '_' . $request->table_name;
            //
            $request_keys = $request->has('keys') ? $request->keys : [];

            
            if (in_array($perm, $request_keys)) {
                if (Permission::where('key', $table_key)->first()) {
                    continue;
                } else {
                    Permission::create([
                                'key' => $table_key,
                                'table_name' => $request->table_name
                        ]);
                }
            } else {
                Permission::where('key', $table_key)->delete();
            }
        }
        
        return redirect(route('manage.permissions.index'))->with('success', 'Updated');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
