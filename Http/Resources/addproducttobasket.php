<?php

namespace App\Http\Resources;

use App\http\Resources\product as ProductResource;
use Illuminate\Http\Resources\Json\JsonResource;
use  App\Models\BasketProduct;
class addproducttobasket extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($product)
    {
        return [
            'products' => ProductResource::collection($this->products),
        ];
    }
}
