<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Models\User;
use App\Services\UserService;

class UserController extends Controller
{
    public function store(UserStoreRequest $request)
    {
        $data = $request->validated();

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
}
