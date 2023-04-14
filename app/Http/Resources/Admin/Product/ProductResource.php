<?php

namespace App\Http\Resources\Admin\Product;

use Illuminate\Http\Resources\Json\JsonResource;
class ProductResource extends JsonResource
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
            'stock' => 100,
            'slug' => $this->slug,
            'vendor' => $this->vendor->name,
            'product_type' => $this->productType->name,
            'brand' => $this->brand->name,
            'status' => $this->status?"<span class='badge rounded-pill badge-soft-success'>Active</span>":"<span class='badge rounded-pill badge-soft-danger'>Deactivate</span>",
            'image' => $this->productVariants[0]->variantMedias->count()>0?"<img style='width:45px;height:45px;' src='".asset($this->productVariants[0]->variantMedias[0]['file'])."'/>":"N/A",
            'created_at' => $this->created_at->format('d M Y'),
        ];
    }
}
