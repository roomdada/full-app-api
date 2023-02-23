<?php
declare(strict_types=1);

namespace App\Actions\Category;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\DataObjects\CategoryDataObject;

final class StoreCategoryAction
{
    public function execute(CategoryDataObject $data) : Category
    {
        DB::beginTransaction();

        $category = Category::create([
            'name' => $data->name,
            'slug' => Str::slug($data->name),
            'image' => $this->storeImage($data->image),
        ]);

        DB::commit();
        return $category;
    }

    public function storeImage(array $image) : string
    {
        foreach($image as $key => $value) {
            $imagePath = $value->store('categories', 'public');
         }
        return $imagePath;
    }
}
