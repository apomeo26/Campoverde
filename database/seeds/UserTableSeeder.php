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
        $role_user= Role::where('name','vigilante')->first();
        $role_admin=Role::where('name','admin')->first();
        $user=new User();
        $user->name='Vigilante';
        $user->email='vigilante@gmail.com';
        $user->password=bcrypt('1234');
        $user->save();
        $user->roles()->attach($role_user);
        $user= new User();
        $user->name='Admin';
        $user->email='admin@gmail.com';
        $user->password=bcrypt('Admon1234');
        $user->save();
        $user->roles()->attach($role_admin);

    }
}
