<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user() : BelongsTo
    {
      return $this->belongsTo(User::class);
    }

    public function category() : BelongsTo
    {
      return $this->belongsTo(Category::class);
    }

      public function createdAt() : Attribute
    {
        return new Attribute(
            get : fn($value) => \Carbon\Carbon::parse($value)->format('d/m/Y'),
        );
    }
}
