<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class product extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return  [
            'product_name'=>$this->product_name,
            'product_price'=>$this->product_price,
            'dep_id'=>$this->dep_id,
            'dep_name'=>$this->dep_name,
            'created_at'=>$this->created_at->format('d/m/y'),
            'updated_at'=>$this->updated_at->format('d/m/y'),
        ];
    }
}
