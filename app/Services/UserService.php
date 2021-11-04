<?php


namespace App\Services;


use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserService extends AbstractModelService
{
    private function additionDataProcess(User $model, array $additionData): void
    {
        if (isset($additionData['permission'])) {
            $model->givePermissionTo($additionData['permission']);
        }
    }
}
