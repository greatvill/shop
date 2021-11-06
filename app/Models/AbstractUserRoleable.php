<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

abstract class AbstractUserRoleable extends User
{
    public const ROLE_CODE = '';

    protected $table = 'users';

    protected static function booted(): void
    {
        static::addGlobalScope('role-' . static::ROLE_CODE, function (Builder $builder) {
            $builder
                ->join('user_has_roles', 'user_has_roles.model_id', 'users.id')
                ->join('roles', 'roles.id', 'user_has_roles.role_id')
                ->where('roles.name', static::ROLE_CODE);
        });
    }
}
