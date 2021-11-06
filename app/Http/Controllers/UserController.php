<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Resources\Json\JsonResource;

class UserController extends Controller
{
    public function __construct(protected UserService $service)
    {
    }

    public function store(UserStoreRequest $request): UserResource
    {
        $data = $request->validated();
        $user = $this->service->create($data);
        return new UserResource($user);
    }

    public function update(User $user, UserUpdateRequest $request): UserResource
    {
        $data = $request->validated();
        $this->service->update($user, $data);
        return new UserResource($user);
    }
}
