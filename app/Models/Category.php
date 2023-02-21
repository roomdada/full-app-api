<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function courses() : HasMany
    {
      return $this->hasMany(Course::class);
    }

    public function createdAt() : Attribute
    {
        return new Attribute(
            get : fn($value) => \Carbon\Carbon::parse($value)->format('d/m/Y'),
        );
    }
}
