<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class StudentCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->map(function ($student) {
                return [
                    'id' => $student->id,
                    'nim' => $student->nim,
                    'name' => $student->name,
                    'email' => $student->email,
                    'created_at' => $student->created_at,
                    'updated_at' => $student->updated_at,
                ];
            }),
        ];
    }
}
