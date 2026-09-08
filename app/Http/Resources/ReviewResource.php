<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,

            'rating' => $this->rating,

            'comment' => $this->comment,

            'user' => [
                'id' => $this->user?->id,
                'name' => $this->user?->name,
            ],

            'book' => [
                'id' => $this->book?->id,
                'title' => $this->book?->title,
            ],

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
