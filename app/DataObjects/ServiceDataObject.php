<?php
namespace App\DataObjects;

final class ServiceDataObject
{
   public function __construct(
    public readonly  string  $name,
    public readonly array  $image,
   ){}
}
