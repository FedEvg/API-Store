<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClothingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'discount' => $this->discount,
            'discount_price' => $this->discount_price,
            'status_id' => $this->status_id,
            'category' => new CategoryResource($this->category),
            'catSize' => new CatSizeResource($this->catSize),
            'brand' => new BrandResource($this->brand),
            'colors' => ColorResource::collection($this->colors),
            'sizesAndQuantity' => SizeAndQuantityResource::collection($this->sizesAndQuantity),
        ];
    }
}
