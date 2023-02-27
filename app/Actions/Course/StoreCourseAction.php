<?php
namespace App\Actions\Course;

use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\DataObjects\ServiceDataObject;

final class StoreCourseAction
{
   public function execute(ServiceDataObject $data) : Course
   {

      DB::beginTransaction();
      $course = Course::create([
         'name' => $data->name,
         'slug' => Str::slug($data->name),
         'image' => $data->image,
         'description' => $data->description,
         'category_id' => $data->category_id,
          'user_id' => $data->user_id,
      ]);

      DB::commit();
      return $course;
   }
}
