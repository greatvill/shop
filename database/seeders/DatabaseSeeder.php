<?php

namespace Database\Seeders;

use App\Models\Admin;
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
        $permissionAdminNames = [
            Permission::CREATE_USER
        ];
        $roleAdmin = Role::createAdmin();
        $permissions = [];
        foreach ($permissionAdminNames as $name) {
            $permissions[] = Permission::create(['name' => $name]);
        }
        $roleAdmin->givePermissionTo($permissions);
        $userAdmin = User::create([
            'name' => env('ADMIN_NAME'),
            'password' => bcrypt(env('ADMIN_PASSWORD')),
            'email' => env('ADMIN_EMAIL')
        ]);
        $userAdmin->assignRole($roleAdmin);
        if (config('app.env') === 'local') {
            (new TestSeeder())->run();
        }
    }
}
