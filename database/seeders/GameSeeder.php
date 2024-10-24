<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Platform;
use Illuminate\Database\Seeder;
use App\Models\TopupgamePackage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    // $categories = Category::whereIn('name', ['War', 'Action', 'Horror'])->get()->pluck('id')->toArray();
    // $platforms = Platform::all();
    // TopupgamePackage::create([
    //     'name' => 'Genshin Impact',
    //     'developer' => 'Hoyoverse',

    //     'categories' => $categories,
    //     'platforms' => $platforms,
        
    // ]);
    }
}
