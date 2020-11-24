<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission;
use Spatie\Permission\PermissionRegistrar;

use App\Models\User;

class UserSeeder extends Seeder
{

    public function run()
    {

        app()[PermissionRegistrar::class]->forgetCachedPermissions();


        $adminrole = Role::create(['name' => 'admin']);
        $userrole = Role::create(['name' => 'user']);
        $confirmerrole = Role::create(['name' => 'confirmer']);
        $ppsrole = Role::create(['name' => 'pps']);
        $checkpointrole = Role::create(['name' => 'checkpoint']);
        $superdirectorerole = Role::create(['name' => 'superdirectore']);
        $directorerole = Role::create(['name' => 'directore']);


        $admin=new User();
        $admin->name="جاوید صالحی";
        $admin->position ="مسئول دیتابیس و گزارشدهی";
        $admin->email="javidsalihe@gmail.com";
        $admin->directory_id = 1;
        $admin->directory_name = 'ریاست روابط بین المللی';
        $admin->deputy_name = 'معاونیت انسجام امور دولت';
        $admin->password = \Illuminate\Support\Facades\Hash::make('one@1');
        $admin->save();

        $admin->assignRole($adminrole);


    }
}
