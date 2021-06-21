<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PetResource extends JsonResource
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
            'id' => $this->id,
            'institution_id' => $this->institution,
            'name' => $this->name,
            'race' => $this->race,
            'birth' => $this->birth,
            'picture' => $this->picture,
        ];
    }
}
