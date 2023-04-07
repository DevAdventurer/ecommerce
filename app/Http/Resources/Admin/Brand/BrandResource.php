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
             'image' => $this->media?'<img class="img-thumbnail avatar-img rounded avatar-sm" src="'.asset($this->media->file).'">':'N/A',
            'created_at' => $this->created_at->format('d M Y'),
        ];
    }
}
