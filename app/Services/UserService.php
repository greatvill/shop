<?php


namespace App\Services;


use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserService
{
    public function create(array $data): User
    {
        $user = new User([
            'email' => $data['email'],
            'name' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        if (!empty($data['permissions'])) {
            $user->givePermissionTo($data['permissions']);
        }

        if (!empty($data['roles'])) {
            $user->assignRole($data['roles']);
        }

        $user->save();
        return $user;
    }

    public function update(User $user, array $data): User
    {
        $user->fill([
            'email' => $data['email'],
            'name' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $user->syncPermissions($data['permissions'] ?? []);

        $user->syncRoles($data['roles'] ?? []);

        $user->save();
        return $user;
    }
}
