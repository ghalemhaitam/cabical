<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        $role_admin = Role::where('name','Admin')->first();
        $role_secretary = Role::where('name','Secretary')->first();


        $admin = new User();
        $admin->name = 'Mohamed GHALEM';
        $admin->email = 'admin@admin.com';
        $admin->password = bcrypt('1234');
        $admin->save();
        $admin->Roles()->attach($role_admin);

        $secretary = new User();
        $secretary->name = 'Khadija kalbab';
        $secretary->email = 'secretary@secretary.com';
        $secretary->password = bcrypt('1234');
        $secretary->save();
        $secretary->Roles()->attach($role_secretary);
*/
    }
}
