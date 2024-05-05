<?php

use Illuminate\Database\Seeder;
use App\Models\Show;
use App\Models\Episode;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class DatabaseSeeder extends Seeder
{
    public function run()
    {

        Permission::create(['name' => 'users-read']);
        Permission::create(['name' => 'notifications-create']);
        Permission::create(['name' => 'user-roles-update']);
        Permission::create(['name' => 'users-update']);
        Permission::create(['name' => 'users-delete']);

        // إنشاء دور وتخصيص الصلاحيات
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(['users-read', 'notifications-create', 'user-roles-update', 'users-update', 'users-delete']);

        // إضافة بيانات العروض
       
}
}
