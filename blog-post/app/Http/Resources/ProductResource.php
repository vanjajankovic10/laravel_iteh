<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public static $wrap = 'product';
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'purpose'  => $this->resource->purpose,
            'skin_type' => $this->resource->skin_type,
            'brand_id' => new BrandResource($this->resource->brand),
            'user_id' => new UserResource($this->resource->user)
        ];
    }
}
