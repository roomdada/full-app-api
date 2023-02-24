<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
          'name' => 'Bureautique',
          'slug' => 'bureautique',
          'image' => "categories/bureau.jpg"
        ]);

        Category::create([
          'name' => 'Securité informatique',
          'slug' => 'secrurite-informatique',
          'image' => "categories/securite.jpg"
        ]);

        Category::create([
          'name' => 'Community Manager',
          'slug' => 'manager',
          'image' => "categories/manager.jpg"
        ]);

        Category::create([
          'name' => 'Developpement',
          'slug' => 'developpement',
          'image' => "categories/web.jpg"
        ]);

        Category::create([
            'name' => 'Design et UX',
            'slug' => Str::slug('Design et UX'),
            'image' => "categories/ux.jpg"
        ]);

        Category::create([
            'name' => 'Communication',
            'slug' => Str::slug('Communication'),
            'image' => "categories/com.jpg"
        ]);

        Category::create([
            'name' => 'Coaching et developpement personnel',
            'slug' => Str::slug('Coaching et developpement personnel'),
            'image' => "categories/motivation.jpg"
        ]);

        Category::create([
            'name' => 'Gestion financière',
            'slug' => Str::slug('Gestion financière'),
            'image' => "categories/finance.jpg"
        ]);


    }
}
