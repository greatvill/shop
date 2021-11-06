<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Manager;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        foreach (Permission::ALL as $permissionName) {
            Permission::create(['name' => $permissionName]);
        }

        $permissionsByRoles = config('permissions');
        $roleAdmin = Role::createAdmin();
        $roleAdmin->givePermissionTo($permissionsByRoles[Role::ADMIN]);

        $userAdmin = User::create([
            'name' => env('ADMIN_NAME'),
            'password' => bcrypt(env('ADMIN_PASSWORD')),
            'email' => env('ADMIN_EMAIL')
        ]);
        $userAdmin->assignRole($roleAdmin);


        $roleManager = Role::createManager();
        $roleManager->givePermissionTo($permissionsByRoles[Role::MANAGER]);

        $roleModerator = Role::createModerator();
        $roleModerator->givePermissionTo($permissionsByRoles[Role::MODERATOR]);

        $roleClient = Role::createClient();
        $roleClient->givePermissionTo($permissionsByRoles[Role::CLIENT]);

        if (config('app.env') === 'local') {
            (new TestSeeder())->run();
        }
    }
}
