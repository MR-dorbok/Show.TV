<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    public function run()
    {
        // إنشاء الصلاحيات
        Permission::create(['name' => 'users-read']);
        Permission::create(['name' => 'notifications-create']);
        Permission::create(['name' => 'user-roles-update']);
        Permission::create(['name' => 'users-update']);
        Permission::create(['name' => 'users-delete']);

        // إنشاء دور وتخصيص الصلاحيات
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(['users-read', 'notifications-create', 'user-roles-update', 'users-update', 'users-delete']);
    }
}
