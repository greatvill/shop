<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
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
        $roleAdmin = Role::create(['name' => Role::ADMIN]);
        $permission = Permission::create(['name' => Permission::CREATE_USER]);
        $roleAdmin->givePermissionTo($permission);

    }
}
