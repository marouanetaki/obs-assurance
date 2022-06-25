<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'approved'       => 1,
                'entreprise'     => 'Orange Business services',
            ],
            [
                'id'             => 2,
                'name'           => 'responsable',
                'email'          => 'respo@respo.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'approved'       => 1,
                'entreprise'     => 'Orange Business services',
            ],
            [
                'id'             => 3,
                'name'           => 'User',
                'email'          => 'user@user.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'approved'       => 1,
                'entreprise'     => 'Orange Business services',
            ],
        ];

        User::insert($users);
    }
}
