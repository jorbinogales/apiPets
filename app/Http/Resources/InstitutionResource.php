<?php

namespace App\Http\Resources;

use App\Models\Pet;
use App\Http\Resources\PetResource;
use Illuminate\Http\Resources\Json\JsonResource;

class InstitutionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'id' => $this->id,
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'pets' => $this->pets
        ];
    }
}
