<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        return[
        'name'=> $this->name,
        'user_id'=>$this->user_id, 
        'description'=>$this->description,
        'height'=>$this->height,
        'width'=>$this->width,
        'weight'=>$this->weight,
        'depth'=>$this->depth,
        'mass'=>$this->mass,
        'distance'=>$this->whenLoaded('distance', $this->distance->name),
        'mass'=>$this->whenLoaded('category', $this->mass->name),
        'category'=>$this->whenLoaded('category', $this->category->name),
        'currency'=>$this->whenLoaded('currency', $this->currency->name),
        'price'=>$this->price,
        'quantity'=>$this->quantity,
        'image'=>$this->image,
           
        ];
    }
}
