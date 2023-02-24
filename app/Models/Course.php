<?php

namespace App\Models;

use App\Models\Traits\FormatCreatedAt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory, FormatCreatedAt;

    protected $guarded = [];

    /**
     * user
     *
     * @return BelongsTo
     */
    public function user() : BelongsTo
    {
      return $this->belongsTo(User::class);
    }

    /**
     * category
     *
     * @return BelongsTo
     */
    public function category() : BelongsTo
    {
      return $this->belongsTo(Category::class);
    }

    /**
     * scopePopular
     *
     * @param  mixed $query
     * @return void
     */
    public function scopePopular($query)
    {
      return $query->latest();
    }
}
