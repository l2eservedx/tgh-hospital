<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUserSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user =
        [[
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'pname' => 'Mr.',
            'fname' => 'Theerapong',
            'lname' => 'Pakham',
            'cid' => '1730600105042',
            'phone_number' => '0966611816',
            'email' => 'admin@admin.com',
            'authKey' => '0',
            'password_reset' => '0',
            'level' => '1',
            'active' => '1'
        ],
        [
            'username' => 'user',
            'password' => bcrypt('user'),
            'pname' => 'Mr.',
            'fname' => 'Theerapong',
            'lname' => 'Pakham',
            'cid' => '1730600105042',
            'phone_number' => '0966611816',
            'email' => 'user@admin.com',
            'authKey' => '0',
            'password_reset' => '0',
            'level' => '0',
            'active' => '1'
        ]];
        foreach ($user as $key => $value)
        {
            User::create($value);
        }
    }
}
