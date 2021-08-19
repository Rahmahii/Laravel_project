<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
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
          'email' => $this->email,
          'phone' => $this->phone,
          'user_id' => $this->user_id,
          'fname' => $this->fname,
          'lname' =>  $this->lname,
          'address'=> $this->address,
          'country'=>$this->whenLoaded('country', $this->country->name),
          'city'=>$this->whenLoaded('city', $this->city->name),
        ];
    }
}
