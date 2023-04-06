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

    function sliderImages($slider, $small_slider){

        $slider_image = 'NA';
        $slider_small_image = 'NA';

        if($slider->count() > 0){
            $slider_image = '<img class="img-thumbnail avatar-img rounded avatar-sm" src="'.asset($slider->file).'">';
        }

        if($slider->count() > 0){
            $slider_small_image = '<img class="img-thumbnail avatar-img rounded avatar-sm" src="'.asset($small_slider->file).'">';
        }
        return $slider_image . ' ' . $slider_small_image;
    }

    public function toArray($request)
    {
        return [
            'sn' => ++$request->start,
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'image' => $this->sliderImages($this->media, $this->SmallMedia),
            'link' => $this->button_link,
            'status' => $this->status?"<span class='badge rounded-pill badge-soft-success'>Active</span>":"<span class='badge rounded-pill badge-soft-danger'>Deactivate</span>",
            'created_at' => $this->created_at->format('d M Y'),
        ];
    }
}
