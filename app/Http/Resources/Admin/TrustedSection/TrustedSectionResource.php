<?php

namespace App\Http\Resources\Admin\TrustedSection;

use Illuminate\Http\Resources\Json\JsonResource;
class TrustedSectionResource extends JsonResource
{
    
    public function myIcon($iconType)
    {
        $icon = 'N/A';
        if ($iconType == 'image') {
            return $icon = '<img class="img-thumbnail avatar-img rounded avatar-sm" src="'.asset($this->media->file).'">';
        }
        if ($iconType == 'icon') {
            return $icon = '<img class="img-thumbnail avatar-img rounded avatar-sm" src="'.asset($geticon->media->file).'">';
        }
        if ($iconType == 'svg') {
            return $icon = '<img class="img-thumbnail avatar-img rounded avatar-sm" src="'.asset($geticon->media->file).'">';
        }
    }

    public function toArray($request)
    {
        return [
            'sn' => ++$request->start,
            'id' => $this->id,
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'icon_type' => $this->icon_type,
            'icon' => $this->myIcon($this->icon_type),
            'created_at' => $this->created_at->format('d M Y'),
        ];
    }
}
