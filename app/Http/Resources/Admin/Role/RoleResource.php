<?php

namespace App\Http\Resources\Admin\Role;

use Illuminate\Http\Resources\Json\JsonResource;
class RoleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'sn' => ++$request->start,
            'id' => $this->id,
            'name' => $this->name,
            'display_name' => $this->display_name,
            'created_at' => $this->created_at->format('d M Y'),
        ];
    }
}
