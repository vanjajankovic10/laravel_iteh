<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BrandResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public static $wrap = 'brand';
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->resource->name,
            'CEO'  => $this->resource->CEO,
            'year' => $this->resource->year,
            'country' => $this->resource->country,
        ];
    }
}
