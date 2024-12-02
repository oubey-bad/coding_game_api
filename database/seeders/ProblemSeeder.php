<?php

namespace Database\Seeders;

use App\Models\Problem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProblemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Problem::create([
            'title' => 'Print Hello, World!',
            'description' => 'Write a program to print "Hello, World!"',
            
            'expected_output' => 'Hello, World!',
        ]);
    }
}
