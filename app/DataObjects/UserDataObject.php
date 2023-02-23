<?php
namespace App\DataObjects;

final class UserDataObject
{
   public function __construct(
    public readonly  string  $first_name,
    public readonly  string  $last_name,
    public readonly  string  $contact,
    public readonly string  $email,
    public readonly string  $password,
   ){}
}
