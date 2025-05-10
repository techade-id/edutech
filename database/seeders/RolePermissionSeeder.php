<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ownerRole = Role::create([
            'name' => 'owner'
        ]);

        $teacherRole = Role::create([
            'name' => 'teacher'
        ]);

        $studentRole = Role::create([
            'name' => 'student'
        ]);

        $userOwner = User::create([
            'name' => 'Admin Techade',
            'occupation' => 'Owner',
            'whatsapp' => '087812066967',
            'avatar' => 'avatars/techade.png',
            'email' => 'admin@techade.id',
            'password' => bcrypt('tekadkanmimpi2025')
        ]);
        $userOwner2 = User::create([
            'name' => 'Admin Sani',
            'occupation' => 'Owner',
            'whatsapp' => '087812066967',
            'avatar' => 'avatars/abdillah.jpg',
            'email' => 'abdillah@techade.id',
            'password' => bcrypt('tekadkanmimpi2025')
        ]);
        $userOwner3 = User::create([
            'name' => 'Admin Azham',
            'occupation' => 'Owner',
            'whatsapp' => '0895379181484',
            'avatar' => 'avatars/azham.jpg',
            'email' => 'azham@techade.id',
            'password' => bcrypt('tekadkanmimpi2025')
        ]);

        $userOwner->assignRole($ownerRole);
        $userOwner2->assignRole($ownerRole);
        $userOwner3->assignRole($ownerRole);
    }
}
