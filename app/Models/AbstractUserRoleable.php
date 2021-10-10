<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

abstract class AbstractUserRoleable extends User
{
    public const ROLE_CODE = 'default';

    protected static function booted(): void
    {
        static::addGlobalScope('role' . static::ROLE_CODE, function (Builder $builder) {
            $builder
                ->join('user_role', 'user_role.user_id', 'user.id')
                ->join('roles', 'roles.id', 'user_role.role_id')
                ->where('roles.code', static::ROLE_CODE);
        });
    }
}
