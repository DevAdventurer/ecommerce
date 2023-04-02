<?php

namespace App\Http\Resources\Admin\ProductInventory;

use Illuminate\Http\Resources\Json\JsonResource;
class ProductInventoryResource extends JsonResource
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
            'name' => $this->title,
            'slug' => $this->slug,
            'status' => $this->status?"<span class='badge rounded-pill badge-soft-success'>Active</span>":"<span class='badge rounded-pill badge-soft-danger'>Deactivate</span>",
            'image' => $this->image?"<img style='width:45px;height:45px;' src='".asset($this->image)."'/>":"N/A",
            'created_at' => $this->created_at->format('d M Y'),
        ];
    }
}
