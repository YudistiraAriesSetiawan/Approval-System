<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = new User();

        $user->name = 'user';
        $user->email = 'user@email.com';
        $user->password = Hash::make('123456');
        $user->assignRole('user');
        $user->save();

        $admin = new User();
        $admin->name = 'admin';
        $admin->email = 'admin@email.com';
        $admin->password = Hash::make('123456');
        $admin->assignRole('admin');
        $admin->save();

    }
}
