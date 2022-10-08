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

        Permission::create(['name' => 'list buses']);
        Permission::create(['name' => 'view buses']);
        Permission::create(['name' => 'create buses']);
        Permission::create(['name' => 'update buses']);
        Permission::create(['name' => 'delete buses']);

        Permission::create(['name' => 'list busroutes']);
        Permission::create(['name' => 'view busroutes']);
        Permission::create(['name' => 'create busroutes']);
        Permission::create(['name' => 'update busroutes']);
        Permission::create(['name' => 'delete busroutes']);

        Permission::create(['name' => 'list cars']);
        Permission::create(['name' => 'view cars']);
        Permission::create(['name' => 'create cars']);
        Permission::create(['name' => 'update cars']);
        Permission::create(['name' => 'delete cars']);

        Permission::create(['name' => 'list carbrands']);
        Permission::create(['name' => 'view carbrands']);
        Permission::create(['name' => 'create carbrands']);
        Permission::create(['name' => 'update carbrands']);
        Permission::create(['name' => 'delete carbrands']);

        Permission::create(['name' => 'list cardrivers']);
        Permission::create(['name' => 'view cardrivers']);
        Permission::create(['name' => 'create cardrivers']);
        Permission::create(['name' => 'update cardrivers']);
        Permission::create(['name' => 'delete cardrivers']);

        Permission::create(['name' => 'list cities']);
        Permission::create(['name' => 'view cities']);
        Permission::create(['name' => 'create cities']);
        Permission::create(['name' => 'update cities']);
        Permission::create(['name' => 'delete cities']);

        Permission::create(['name' => 'list citycategories']);
        Permission::create(['name' => 'view citycategories']);
        Permission::create(['name' => 'create citycategories']);
        Permission::create(['name' => 'update citycategories']);
        Permission::create(['name' => 'delete citycategories']);

        Permission::create(['name' => 'list allcityevents']);
        Permission::create(['name' => 'view allcityevents']);
        Permission::create(['name' => 'create allcityevents']);
        Permission::create(['name' => 'update allcityevents']);
        Permission::create(['name' => 'delete allcityevents']);

        Permission::create(['name' => 'list countries']);
        Permission::create(['name' => 'view countries']);
        Permission::create(['name' => 'create countries']);
        Permission::create(['name' => 'update countries']);
        Permission::create(['name' => 'delete countries']);

        Permission::create(['name' => 'list destinationblogs']);
        Permission::create(['name' => 'view destinationblogs']);
        Permission::create(['name' => 'create destinationblogs']);
        Permission::create(['name' => 'update destinationblogs']);
        Permission::create(['name' => 'delete destinationblogs']);

        Permission::create(['name' => 'list eventtypes']);
        Permission::create(['name' => 'view eventtypes']);
        Permission::create(['name' => 'create eventtypes']);
        Permission::create(['name' => 'update eventtypes']);
        Permission::create(['name' => 'delete eventtypes']);

        Permission::create(['name' => 'list faqs']);
        Permission::create(['name' => 'view faqs']);
        Permission::create(['name' => 'create faqs']);
        Permission::create(['name' => 'update faqs']);
        Permission::create(['name' => 'delete faqs']);

        Permission::create(['name' => 'list holidays']);
        Permission::create(['name' => 'view holidays']);
        Permission::create(['name' => 'create holidays']);
        Permission::create(['name' => 'update holidays']);
        Permission::create(['name' => 'delete holidays']);

        Permission::create(['name' => 'list hotels']);
        Permission::create(['name' => 'view hotels']);
        Permission::create(['name' => 'create hotels']);
        Permission::create(['name' => 'update hotels']);
        Permission::create(['name' => 'delete hotels']);

        Permission::create(['name' => 'list hotelfacilities']);
        Permission::create(['name' => 'view hotelfacilities']);
        Permission::create(['name' => 'create hotelfacilities']);
        Permission::create(['name' => 'update hotelfacilities']);
        Permission::create(['name' => 'delete hotelfacilities']);

        Permission::create(['name' => 'list hotelservices']);
        Permission::create(['name' => 'view hotelservices']);
        Permission::create(['name' => 'create hotelservices']);
        Permission::create(['name' => 'update hotelservices']);
        Permission::create(['name' => 'delete hotelservices']);

        Permission::create(['name' => 'list hoteltypes']);
        Permission::create(['name' => 'view hoteltypes']);
        Permission::create(['name' => 'create hoteltypes']);
        Permission::create(['name' => 'update hoteltypes']);
        Permission::create(['name' => 'delete hoteltypes']);

        Permission::create(['name' => 'list insurances']);
        Permission::create(['name' => 'view insurances']);
        Permission::create(['name' => 'create insurances']);
        Permission::create(['name' => 'update insurances']);
        Permission::create(['name' => 'delete insurances']);

        Permission::create(['name' => 'list insuranceagencies']);
        Permission::create(['name' => 'view insuranceagencies']);
        Permission::create(['name' => 'create insuranceagencies']);
        Permission::create(['name' => 'update insuranceagencies']);
        Permission::create(['name' => 'delete insuranceagencies']);

        Permission::create(['name' => 'list jobs']);
        Permission::create(['name' => 'view jobs']);
        Permission::create(['name' => 'create jobs']);
        Permission::create(['name' => 'update jobs']);
        Permission::create(['name' => 'delete jobs']);

        Permission::create(['name' => 'list jobcategories']);
        Permission::create(['name' => 'view jobcategories']);
        Permission::create(['name' => 'create jobcategories']);
        Permission::create(['name' => 'update jobcategories']);
        Permission::create(['name' => 'delete jobcategories']);

        Permission::create(['name' => 'list jobsubcategories']);
        Permission::create(['name' => 'view jobsubcategories']);
        Permission::create(['name' => 'create jobsubcategories']);
        Permission::create(['name' => 'update jobsubcategories']);
        Permission::create(['name' => 'delete jobsubcategories']);

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

        Permission::create(['name' => 'list visas']);
        Permission::create(['name' => 'view visas']);
        Permission::create(['name' => 'create visas']);
        Permission::create(['name' => 'update visas']);
        Permission::create(['name' => 'delete visas']);

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
