<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('admins')->insert([
            'name' => 'Asif Jamal',
            'email' => 'asifjamal251@gmail.com',
            'password' => Hash::make('123456'),
            'mobile_no' => 9315647380,
            'role_id' => 1,
            'avatar' => 'storage/admin/default-avatar.png',
            'status' => 1,
        ]);

        DB::table('roles')->insert([
            'name' => 'root',
            'display_name' => 'Root',
        ]);

        DB::table('site_settings')->insert([
            'title' => 'App',
            'description' => 'App description',
            'logo' => 'storage/site-setting/default-logo.png',
            'favicon' => 'storage/site-setting/default-favicon.png',
            'email' => 'info@example.com',
            'contact_no' => '+91 9315647380',
            
        ]);

        DB::table('permissions')->insert([
            [
                'menu_slug' => 'admin',
                'permission_key' => 'add_admin',
            ],
            [
                'menu_slug' => 'admin',
                'permission_key' => 'browse_admin',
            ],
            [
                'menu_slug' => 'admin',
                'permission_key' => 'delete_admin',
            ],
            [
                'menu_slug' => 'admin',
                'permission_key' => 'edit_admin',
            ],


            [
                'menu_slug' => 'bread',
                'permission_key' => 'add_bread',
            ],
            [
                'menu_slug' => 'bread',
                'permission_key' => 'browse_bread',
            ],
            [
                'menu_slug' => 'bread',
                'permission_key' => 'delete_bread',
            ],
            [
                'menu_slug' => 'bread',
                'permission_key' => 'edit_bread',
            ],



            [
                'menu_slug' => 'role',
                'permission_key' => 'add_role',
            ],
            [
                'menu_slug' => 'role',
                'permission_key' => 'browse_role',
            ],
            [
                'menu_slug' => 'role',
                'permission_key' => 'delete_role',
            ],
            [
                'menu_slug' => 'role',
                'permission_key' => 'edit_role',
            ],



            
            [
                'menu_slug' => 'dashboard',
                'permission_key' => 'browse_dashboard',
            ],



            [
                'menu_slug' => 'setting',
                'permission_key' => 'add_setting',
            ],
            [
                'menu_slug' => 'setting',
                'permission_key' => 'browse_setting',
            ],
            [
                'menu_slug' => 'setting',
                'permission_key' => 'delete_setting',
            ],
            [
                'menu_slug' => 'setting',
                'permission_key' => 'edit_setting',
            ],



            [
                'menu_slug' => 'menu',
                'permission_key' => 'add_menu',
            ],
            [
                'menu_slug' => 'menu',
                'permission_key' => 'browse_menu',
            ],
            [
                'menu_slug' => 'menu',
                'permission_key' => 'delete_menu',
            ],
            [
                'menu_slug' => 'menu',
                'permission_key' => 'edit_menu',
            ],
        ]);

        DB::table('role_permissions')->insert([
            [
                'role_id' => 1,
                'permission_key' => 'add_admin',
            ],
            [
                'role_id' => 1,
                'permission_key' => 'browse_admin',
            ],
            [
                'role_id' => 1,
                'permission_key' => 'delete_admin',
            ],
            [
                'role_id' => 1,
                'permission_key' => 'edit_admin',
            ],


            [
                'role_id' => 1,
                'permission_key' => 'add_bread',
            ],
            [
                'role_id' => 1,
                'permission_key' => 'browse_bread',
            ],
            [
                'role_id' => 1,
                'permission_key' => 'delete_bread',
            ],
            [
                'role_id' => 1,
                'permission_key' => 'edit_bread',
            ],



            [
                'role_id' => 1,
                'permission_key' => 'add_role',
            ],
            [
                'role_id' => 1,
                'permission_key' => 'browse_role',
            ],
            [
                'role_id' => 1,
                'permission_key' => 'delete_role',
            ],
            [
                'role_id' => 1,
                'permission_key' => 'edit_role',
            ],



            
            [
                'role_id' => 1,
                'permission_key' => 'browse_dashboard',
            ],



            [
                'role_id' => 1,
                'permission_key' => 'add_setting',
            ],
            [
                'role_id' => 1,
                'permission_key' => 'browse_setting',
            ],
            [
                'role_id' => 1,
                'permission_key' => 'delete_setting',
            ],
            [
                'role_id' => 1,
                'permission_key' => 'edit_setting',
            ],



            [
                'role_id' => 1,
                'permission_key' => 'add_menu',
            ],
            [
                'role_id' => 1,
                'permission_key' => 'browse_menu',
            ],
            [
                'role_id' => 1,
                'permission_key' => 'delete_menu',
            ],
            [
                'role_id' => 1,
                'permission_key' => 'edit_menu',
            ],

        ]);

        DB::table('menus')->insert([
            [
                'name' => 'Admin',
                'slug' => 'admin',
                'parent' => Null,
                'ordering' => 1,
                'status' => 1,
            ],
            [
                'name' => 'Bread',
                'slug' => 'bread',
                'parent' => 'setting',
                'ordering' => 1,
                'status' => 1,
            ],
            [
                'name' => 'Role',
                'slug' => 'role',
                'parent' => 'setting',
                'ordering' => 1,
                'status' => 1,
            ],
            [
                'name' => 'Dashboard',
                'slug' => 'dashboard',
                'parent' => Null,
                'ordering' => 1,
                'status' => 1,
            ],
            [
                'name' => 'Setting',
                'slug' => 'setting',
                'parent' => Null,
                'ordering' => 1,
                'status' => 1,
            ],
            [
                'name' => 'Menu',
                'slug' => 'menu',
                'parent' => Null,
                'ordering' => 1,
                'status' => 1,
            ]

        ]);
    }
}
