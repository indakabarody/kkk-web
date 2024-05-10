<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TransactionCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->map(function ($transaction) {
                return [
                    'id' => $transaction->id,
                    'student_id' => $transaction->student_id,
                    'type' => $transaction->type,
                    'category' => $transaction->category,
                    'amount_idr' => $transaction->amount_idr,
                    'date' => $transaction->date,
                    'notes' => $transaction->notes,
                    'created_at' => $transaction->created_at,
                    'updated_at' => $transaction->updated_at,
                ];
            }),
        ];
    }
}
