<?php

namespace App\Models;

use App\Models\Traits\FormatCreatedAt;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory, FormatCreatedAt;

    protected $guarded = [];

    public function courses() : HasMany
    {
      return $this->hasMany(Course::class);
    }

}
