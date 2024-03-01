<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class profile extends JsonResource
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
        return [
            'name'=>$this->name,
            'email'=>$this->email,
            'gender'=>$this->gender,
            'serial_number'=>$this->serial_number,
            'personal_image'=>$this->personal_image,
            'created_at'=>$this->created_at->format('d/m/y'),
            'updated_at'=>$this->updated_at->format('d/m/y'),
        ];
    }
}
