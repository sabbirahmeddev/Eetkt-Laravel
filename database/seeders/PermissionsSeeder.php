<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create default permissions
        Permission::create(['name' => 'list blogs']);
        Permission::create(['name' => 'view blogs']);
        Permission::create(['name' => 'create blogs']);
        Permission::create(['name' => 'update blogs']);
        Permission::create(['name' => 'delete blogs']);

        Permission::create(['name' => 'list blogcategories']);
        Permission::create(['name' => 'view blogcategories']);
        Permission::create(['name' => 'create blogcategories']);
        Permission::create(['name' => 'update blogcategories']);
        Permission::create(['name' => 'delete blogcategories']);

        Permission::create(['name' => 'list faqs']);
        Permission::create(['name' => 'view faqs']);
        Permission::create(['name' => 'create faqs']);
        Permission::create(['name' => 'update faqs']);
        Permission::create(['name' => 'delete faqs']);

        Permission::create(['name' => 'list pages']);
        Permission::create(['name' => 'view pages']);
        Permission::create(['name' => 'create pages']);
        Permission::create(['name' => 'update pages']);
        Permission::create(['name' => 'delete pages']);

        Permission::create(['name' => 'list settings']);
        Permission::create(['name' => 'view settings']);
        Permission::create(['name' => 'create settings']);
        Permission::create(['name' => 'update settings']);
        Permission::create(['name' => 'delete settings']);

        Permission::create(['name' => 'list settinggroups']);
        Permission::create(['name' => 'view settinggroups']);
        Permission::create(['name' => 'create settinggroups']);
        Permission::create(['name' => 'update settinggroups']);
        Permission::create(['name' => 'delete settinggroups']);

        Permission::create(['name' => 'list sociallinks']);
        Permission::create(['name' => 'view sociallinks']);
        Permission::create(['name' => 'create sociallinks']);
        Permission::create(['name' => 'update sociallinks']);
        Permission::create(['name' => 'delete sociallinks']);

        // Create user role and assign existing permissions
        $currentPermissions = Permission::all();
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo($currentPermissions);

        // Create admin exclusive permissions
        Permission::create(['name' => 'list roles']);
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'list permissions']);
        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'delete permissions']);

        Permission::create(['name' => 'list users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        // Create admin role and assign all permissions
        $allPermissions = Permission::all();
        $adminRole = Role::create(['name' => 'super-admin']);
        $adminRole->givePermissionTo($allPermissions);

        $user = \App\Models\User::whereEmail('admin@admin.com')->first();

        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}
