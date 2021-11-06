<?php


namespace App\Models;


/**
 * App\Models\Permission
 *
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission query()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Permission extends \Spatie\Permission\Models\Permission
{
    public const CREATE_USER = 'create_user';
    public const DELETE_USER = 'delete_user';
    public const EDIT_USER = 'edit_user';
    public const VIEW_USER = 'view_user';

    public const CREATE_ORDER = 'create_order';
    public const DELETE_ORDER = 'delete_order';
    public const EDIT_ORDER = 'edit_order';
    public const VIEW_ORDER = 'view_order';
    public const CHANGE_STATUS_ORDER = 'change_status_order';

    public const CREATE_PRODUCT = 'create_product';
    public const DELETE_PRODUCT = 'delete_product';
    public const EDIT_PRODUCT = 'edit_product';
    public const VIEW_PRODUCT = 'view_product';

    public const ALL = [
        self::CREATE_USER,
        self::DELETE_USER,
        self::EDIT_USER,
        self::VIEW_USER,

        self::CREATE_ORDER,
        self::DELETE_ORDER,
        self::EDIT_ORDER,
        self::VIEW_ORDER,
        self::CHANGE_STATUS_ORDER,

        self::CREATE_PRODUCT,
        self::DELETE_PRODUCT,
        self::EDIT_PRODUCT,
        self::VIEW_PRODUCT,
    ];
}
