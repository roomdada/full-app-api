<?php
namespace App\DataObjects;

final class ServiceDataObject
{
   public function __construct(
    public readonly  string  $name,
    public readonly  string  $description,
    public readonly  int  $category_id,
    public readonly  int  $user_id,
    public readonly string  $image,
   ){}
}
