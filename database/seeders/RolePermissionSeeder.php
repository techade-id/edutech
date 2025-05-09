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
            'avatar' => 'avatars/default-avatar.svg',
            'email' => 'admin@techade.id',
            'password' => bcrypt('tekadkanmimpi2025')
        ]);
        $userOwner = User::create([
            'name' => 'Admin Sani',
            'occupation' => 'Owner',
            'whatsapp' => '087812066967',
            'avatar' => 'avatars/default-avatar.svg',
            'email' => 'abdillah@techade.id',
            'password' => bcrypt('tekadkanmimpi2025')
        ]);

        $userOwner->assignRole($ownerRole);
    }
}
