<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\PermissionResource;
use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'permissions' => $this->permissions,
            // 'permissions' => PermissionResource::collection($this->whenLoaded('permissions')),
        ];
    }
}
