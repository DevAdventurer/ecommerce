<?php

namespace App\Http\Resources\Admin\TrustedSection;

use Illuminate\Http\Resources\Json\JsonResource;
class TrustedSectionResource extends JsonResource
{
    
    public function icon($iconType)
    {
        return "ok";
    }

    public function toArray($request)
    {
        return [
            'sn' => ++$request->start,
            'id' => $this->id,
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'icon_type' => $this->icon_type,
            'icon' => $this->icon($this->icon_type),
            'created_at' => $this->created_at->format('d M Y'),
        ];
    }
}
