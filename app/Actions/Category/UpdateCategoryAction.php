<?php
declare(strict_types=1);

namespace App\Actions\Category;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\DataObjects\CategoryDataObject;

final class UpdateCategoryAction
{
    public function execute(
      CategoryDataObject $data,
      Category $category
      ) : Category
    {
        DB::beginTransaction();

        $category->update([
            'name' => $data->name,
            'slug' => Str::slug($data->name),
            'image' => $this->storeImage($data->image),
        ]);

        DB::commit();
        return $category;
    }

    public function storeImage(array | string $image) : string
    {

        foreach($image as $key => $value) {
          if(is_string($value)) {
              return $value;
          }
            $imagePath = $value->store('categories', 'public');
         }
        return $imagePath;
    }
}
