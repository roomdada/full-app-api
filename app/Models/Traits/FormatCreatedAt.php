<?php
namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait FormatCreatedAt
{
   public function createdAt() : Attribute
   {
    return new Attribute(
        get : fn($value) => \Carbon\Carbon::parse($value)->format('d/m/Y'),
    );
   }
}
