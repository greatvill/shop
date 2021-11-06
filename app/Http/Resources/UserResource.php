<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * @var User $resource
     */
    public $resource;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'email' => $this->resource->email,
            'created_at' => $this->resource->created_at,
            'updated_at' => $this->resource->updated_at,
            'roles' => $this->resource->roles->pluck('name'),
            'permission' => $this->resource->permissions->pluck('name'),
        ];
    }
}
