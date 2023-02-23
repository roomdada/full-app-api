<?php
declare(strict_types=1);
namespace App\Responses\Categorie;

use App\Http\Resources\CategoryResource;

final class CategoryCollectionResponse
{
    public function __construct(
        private readonly CategoryResource $categoriesCollection,
        private readonly int $status
    ) {}

    public function toResponse(): array
    {
        return [
            'status' => $this->status,
            'data' => $this->categoriesCollection
        ];
    }
}
