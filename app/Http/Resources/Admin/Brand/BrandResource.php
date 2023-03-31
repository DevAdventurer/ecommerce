<?php

namespace App\Http\Resources\Admin\Brand;

use Illuminate\Http\Resources\Json\JsonResource;
class BrandResource extends JsonResource
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
            'image' => $this->image?'<img style="height:45px;width:45px;" src="'.asset($this->image).'">':'N/A',
            'created_at' => $this->created_at->format('d M Y'),
        ];
    }
}
