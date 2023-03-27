<?php

namespace App\Http\Resources\Admin\Slider;

use Illuminate\Http\Resources\Json\JsonResource;
class SliderResource extends JsonResource
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
            'title' => $this->title,
            'body' => $this->body,
            'image' => "<img class='rounded avatar-sm' src='".asset($this->image)."' >",
            'link' => $this->button_link,
            'status' => $this->status?"<span class='badge rounded-pill badge-soft-success'>Active</span>":"<span class='badge rounded-pill badge-soft-danger'>Deactivate</span>",
            'created_at' => $this->created_at->format('d M Y'),
        ];
    }
}
