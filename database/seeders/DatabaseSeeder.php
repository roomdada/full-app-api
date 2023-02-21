<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      $this->call(CategorySeeder::class);
      \App\Models\Course::factory(10)->create();
      User::create([
        'first_name' => 'John',
        'last_name' => 'Doe',
        'contact' => '09123456789',
        'email' => 'admin@email.com',
        'password' => Hash::make('password'),
        'is_admin' => true,
    ]);
}


}
