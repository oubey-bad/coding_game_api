<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Easy', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Medium', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Hard', 'created_at' => now(), 'updated_at' => now()],
        ];
        foreach($categories as $category){
            category::create($category);

        }
    }
}
