<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,

            'book' => [
                'id' => $this->book->id,
                'title' => $this->book->title,
                'isbn' => $this->book->isbn,
            ],

            'borrowed_at' => $this->borrowed_at,
            'due_at' => $this->due_at,
            'returned_at' => $this->returned_at,

            'status' => $this->returned_at
                ? 'returned'
                : 'active',

            'created_at' => $this->created_at,
        ];
    }
}
