<?php

use App\Models\Permission;

return [
    'users.store' => Permission::CREATE_USER,
    'users.list' => Permission::VIEW_USER,
    'users.update' => Permission::EDIT_USER,
    'users.delete' => Permission::DELETE_USER,
];
