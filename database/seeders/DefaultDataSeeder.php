<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class DefaultDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //MAKING SHURE ALL THESE TABLES ARE EMPTY
        DB::statement("SET foreign_key_checks=0");
        DB::table('pages')->truncate();
        DB::table('permissions')->truncate();
        DB::table('roles')->truncate();
        DB::table('role_has_permissions')->truncate();
        DB::table('users')->truncate();
        DB::table('model_has_roles')->truncate();
        DB::table('model_has_permissions')->truncate();
        DB::statement("SET foreign_key_checks=1");

        //CREATING DEFAULT PAGES
        Page::create([
            'title'  => 'global'
        ]);
        Page::create([
            'title'  => 'role'
        ]);
        Page::create([
            'title'  => 'user'
        ]);

        //CREATING DEFAULT PERMISSION
        $pages = array('global', 'role', 'user');
        for($i=0; $i<count($pages); $i++)
        {
            if($pages[$i] != "global"){
                $view    = Permission::create(['name' => $pages[$i]." view"]);
                $add     = Permission::create(['name' => $pages[$i]." create"]);
                $edit    = Permission::create(['name' => $pages[$i]." edit"]);
                $delete  = Permission::create(['name' => $pages[$i]." delete"]);
            }else{
                $master    = Permission::create(['name' => "master"]);
                $global    = Permission::create(['name' => "global"]);
            }
        }

        //CREATING DEFAULT ROLE WITH THEIR PERMISSION
        $role_developer = Role::create(['name' => strtolower('developer')]);
        $role_developer->givePermissionTo(1);

        $role_super_admin = Role::create(['name' => strtolower('super admin')]);
        $role_super_admin->givePermissionTo(2);

        $role_uncategorized = Role::create(['name' => strtolower('uncategorized')]);

        //CREATING DEFAULT USER WITH THEIR ROLE
        $user_master_developer = User::create([
            'name'     => 'Master Developer',
            'email' =>  'dev@email.com',
            'password' => Hash::make('password')
        ]);
        $user_master_developer->assignRole('developer');

        $user_super_admin = User::create([
            'name'     => 'Master Super Admin',
            'email'    =>  'admin@email.com',
            'password' => Hash::make('password')
        ]);
        $user_super_admin->assignRole('super admin');
    }
}
