<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert(
            [
                [
                    'name' => 'Admin', 'email' => 'admin@email.com', 'password' => Hash::make('admin'), 'role_id' => 1,
                ],
                [
                    'name' => 'User', 'email' => 'user@email.com', 'password' => Hash::make('123456789'), 'role_id' => 2,
                ]
            ]
        );
    }
}
