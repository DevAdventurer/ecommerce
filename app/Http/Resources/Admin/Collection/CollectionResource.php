<?php

namespace App\Http\Resources\Admin\Collection;

use Illuminate\Http\Resources\Json\JsonResource;
class CollectionResource extends JsonResource
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
            'image' => $this->image?'<img style="height:45px;width:45px;" src="'.asset($this->image).'">':'N/A',
            'status' => $this->status?"<span class='badge rounded-pill badge-soft-success'>Active</span>":"<span class='badge rounded-pill badge-soft-danger'>Deactivate</span>",
            'created_at' => $this->created_at->format('d M Y'),
        ];
    }
}
