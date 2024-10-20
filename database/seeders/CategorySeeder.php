<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Platform;
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
        Category::insert([
            ['name' => 'War', 'slug' => Str::slug('War')],
            ['name' => 'Action', 'slug' => Str::slug('Action')],
            ['name' => 'Horror', 'slug' => Str::slug('Horror')]
        ]);

        Platform::create([
            'name' => 'Pc', 'slug' => Str::slug('Pc')
        ]);
    }
}
