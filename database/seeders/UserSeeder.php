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
        $roleOwner = Role::create(['name' => 'owner']);
        $roleManager = Role::create(['name' => 'manager']);

        $permissionOwner = Permission::create(['name' => 'View-own-data']);
        $permissionManager = Permission::create(['name' => 'Management-cabang']);

        $roleOwner->givePermissionTo($permissionOwner);
        $roleManager->givePermissionTo($permissionManager);

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


        $managerData = [
            [
                'name' => 'Adam',
                'posisi' => 'Manager Cabang Jakarta',
                'email' => 'managerjakarta@gmail.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Fiqri',
                'posisi' => 'Manager Cabang Bogor',
                'email' => 'managerbogor@gmail.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Syania',
                'posisi' => 'Manager Cabang Depok',
                'email' => 'managerdepok@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Syania',
                'posisi' => 'Manager Cabang Tangerang',
                'email' => 'managertangerang@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Syania',
                'posisi' => 'Manager Cabang Bekasi',
                'email' => 'managerbekasi@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($managerData as $managerInfo) {
            $manager = User::create($managerInfo);
            $manager->assignRole('manager');

            switch ($managerInfo['posisi']) {
                case 'Manager Cabang Jakarta':
                    $manager->branches()->attach(1);
                    break;

                case 'Manager Cabang Bogor':
                    $manager->branches()->attach(2);
                    break;

                case 'Manager Cabang Depok':
                    $manager->branches()->attach(3);
                    break;

                case 'Manager Cabang Tangerang':
                    $manager->branches()->attach(4);
                    break;

                case 'Manager Cabang Bekasi':
                    $manager->branches()->attach(5);
                    break;
            }
        }
    }
}
