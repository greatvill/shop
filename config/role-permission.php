<?php

use App\Models\Permission;
use App\Models\Role;

return [
    Role::ADMIN => [
        Permission::CREATE_USER,
        Permission::DELETE_USER,
        Permission::EDIT_USER,
        Permission::VIEW_USER,

        Permission::CREATE_ORDER,
        Permission::DELETE_ORDER,
        Permission::EDIT_ORDER,
        Permission::VIEW_ORDER,
        Permission::CHANGE_STATUS_ORDER,

        Permission::CREATE_PRODUCT,
        Permission::DELETE_PRODUCT,
        Permission::EDIT_PRODUCT,
        Permission::VIEW_PRODUCT,
    ],
    Role::MANAGER => [
        Permission::CREATE_ORDER,
        Permission::EDIT_ORDER,
        Permission::VIEW_ORDER,
        Permission::CHANGE_STATUS_ORDER,
    ],
    Role::MODERATOR => [
        Permission::CREATE_PRODUCT,
        Permission::DELETE_PRODUCT,
        Permission::EDIT_PRODUCT,
        Permission::VIEW_PRODUCT,
    ],
    Role::CLIENT => [
        Permission::CREATE_ORDER
    ]
];
