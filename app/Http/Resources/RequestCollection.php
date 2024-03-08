<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RequestCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return  $this->collection->map(function ($modelRequest) {
            return [
                'id' => $modelRequest->id,
                'purpose' => $modelRequest->purpose,
                'description' => $modelRequest->description,
                'programProject' => $modelRequest->programProject,
                'created_at' => $modelRequest->created_at->format(' M D Y'),
                // 'participant1' => $modelRequest->participant1->map(function ($participant1) {
                //     return [
                //         'user' => [
                //             'id' => $participant1->user->id,
                //             'name' => $participant1->user->name,
                //         ],
                //     ];
                // }),

            ];
        });
    }
}
