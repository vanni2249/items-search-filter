<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Item;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Category::factory()->createMany([
            ['name' => 'beauty'],
            ['name' => 'barber'],
            ['name' => 'pedicure'],
        ]);

        Item::factory(500)->create()->each(function($item){
            $category = Category::find(rand(1,3));
            $item->categories()->attach($category->id);
        });
    }
}
