<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_owner = Role::create([
            'name' => 'owner'
        ]);

        $role_manager = Role::create([
            'name' => 'manager1'
        ]);

        $role_manager = Role::create([
            'name' => 'manager2'
        ]);

        $role_manager = Role::create([
            'name' => 'manager3'
        ]);

        // membuat user
        $owner = User::create([
            'name' => 'Jayusmanr',
            'posisi' => 'owner',
            'email' => 'owner@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $owner->assignRole('owner');

        $manager1 = User::create([
            'name' => 'Adam',
            'posisi' => 'Manager Cabang Jakarta',
            'email' => 'manager1@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $manager2 = User::create([
            'name' => 'Fiqri',
            'posisi' => 'Manager Cabang Bogor',
            'email' => 'manager2@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $manager3 = User::create([
            'name' => 'Syania',
            'posisi' => 'Manager Cabang Cianjur',
            'email' => 'manager3@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        $manager1->assignRole('manager1');
        $manager2->assignRole('manager2');
        $manager3->assignRole('manager3');



    }
}