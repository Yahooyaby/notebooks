<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NotebookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'full_name' => $this->full_name,
            'company' => $this->company,
            'phone_number' => $this->phone_number,
            'email' => $this->email,
            'date_of_birth' => $this->date_of_birth,
            'photo_path' => $this->photo_path,
        ];
    }
}
