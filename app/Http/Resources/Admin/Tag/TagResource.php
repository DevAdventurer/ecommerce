<?php

namespace App\Http\Resources\Admin\Tag;

use Illuminate\Http\Resources\Json\JsonResource;
class TagResource extends JsonResource
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
            'slug' => $this->slug,
            'created_at' => $this->created_at->format('d M Y'),
        ];
    }
}
