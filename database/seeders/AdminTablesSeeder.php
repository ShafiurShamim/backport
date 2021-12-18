<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminTablesSeeder extends Seeder
{
    // protected $permission_types = ['c', 'r', 'u', 'd'];
    
    protected $permission_types = ['browse', 'read', 'add', 'edit', 'delete'];

    protected $role_types=['super', 'admin', 'editor', 'contributor', 'guest'];

    protected $permission_tables = [
        'admins',
        'users',
        'roles',
        'permissions',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            [
              'id' => 1,
              'name' => 'Super User',
              'login' => 'super',
              'email' => 'super@backport.local',
              'password' => bcrypt('sp123456'),
              'api_token' => bin2hex(openssl_random_pseudo_bytes(30)),
              'display_name' => 'Super',
              'status' => 1,
              'created_at' => now()
            ],
            [
              'id' => 2,
              'name' => 'Admin User',
              'login' => 'admin',
              'email' => 'admin@backport.local',
              'password' => bcrypt('ad123456'),
              'api_token' => bin2hex(openssl_random_pseudo_bytes(30)),
              'display_name' => 'Admin',
              'status' => 1,
              'created_at' => now()
            ],
            [
              'id' => 3,
              'name' => 'Editor User',
              'login' => 'editor',
              'email' => 'editor@backport.local',
              'password' => bcrypt('ed123456'),
              'api_token' => bin2hex(openssl_random_pseudo_bytes(30)),
              'display_name' => 'Editor',
              'status' => 1,
              'created_at' => now()
            ],
            [
              'id' => 4,
              'name' => 'Contributor User',
              'login' => 'contributor',
              'email' => 'contributor@backport.local',
              'password' => bcrypt('co123456'),
              'api_token' => bin2hex(openssl_random_pseudo_bytes(30)),
              'display_name' => 'Contributor',
              'status' => 1,
              'created_at' => now()
            ],
            [
              'id' => 5,
              'name' => 'Guest User',
              'login' => 'guest',
              'email' => 'guest@backport.local',
              'password' => bcrypt('gu123456'),
              'api_token' => bin2hex(openssl_random_pseudo_bytes(30)),
              'display_name' => 'Guest',
              'status' => 0,
              'created_at' => now()
            ],
        ]);
        DB::table('roles')->insert([
            [
              'id' => 1,
              'name' => 'super',
              'display_name' => 'Super Admin',
              'created_at' => now()
            ],
            [
              'id' => 2,
              'name' => 'admin',
              'display_name' => 'Admin',
              'created_at' => now()
            ],
            [
              'id' => 3,
              'name' => 'editor',
              'display_name' => 'Editor',
              'created_at' => now()
            ],
            [
              'id' => 4,
              'name' => 'contributor',
              'display_name' => 'Contributor',
              'created_at' => now()
            ],
            [
              'id' => 5,
              'name' => 'guest',
              'display_name' => 'Guest',
              'created_at' => now()
            ]
        ]);
        DB::table('admin_role')->insert([
            [
                'role_id' => 1,
                'admin_id' => 1
            ],
            [
                'role_id' => 2,
                'admin_id' => 2
            ],
            [
                'role_id' => 3,
                'admin_id' => 3
            ],
            [
                'role_id' => 4,
                'admin_id' => 4
            ],
            [
                'role_id' => 5,
                'admin_id' => 5
            ]
        ]);

        $arr = [];
        foreach ($this->permission_tables as $table) {
            foreach ($this->permission_types as $permission) {
                // $arr[]= array([
                $perms = \App\Models\Permission::create([
                    "key"=> $permission . '_' . $table,
                    "table_name"=> $table
                ]);
                \App\Models\PermissionRole::create([
                    'permission_id' => $perms->id,
                    'role_id' => 1
                ]);
            }
        }
    }
}
