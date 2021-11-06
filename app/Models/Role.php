<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Role
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $guard_name
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Role permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereGuardName($value)
 */
class Role extends \Spatie\Permission\Models\Role
{
    use HasFactory;

    public const MANAGER = 'manager';
    public const CLIENT = 'manager';
    public const ADMIN = 'admin';

    public static function createAdmin(): Model|\Illuminate\Database\Eloquent\Builder
    {
        return self::create(['name' => self::ADMIN]);
    }

    public static function createClient(): Model|\Illuminate\Database\Eloquent\Builder
    {
        return self::create(['name' => self::CLIENT]);
    }

    public static function createManager(): Model|\Illuminate\Database\Eloquent\Builder
    {
        return self::create(['name' => self::MANAGER]);
    }

    public static function getAdmin()
    {
        return self::findByName(self::ADMIN);
    }
}
