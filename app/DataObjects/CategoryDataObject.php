<?php
namespace App\DataObjects;

final class CategoryDataObject
{
   public function __construct(
    public readonly  string  $name,
    public readonly array  $image,
   ){}
}
