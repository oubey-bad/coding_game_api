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
            ['name'=>'الهواتف الذكية'],
            ['name'=>'أجهزة الألعاب'],
            ['name'=>'الأجهزة المنزلية'],
            ['name'=>' الملابس'],
            
        ];
        foreach($categories as $category){
            category::create($category);

        }
    }
}
