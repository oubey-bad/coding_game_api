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
            $problems = [
                [
                    'title' => 'Print Hello, World!',
                    'description' => 'Write a program to print "Hello, World!"',
                ],
                [
                    'title' => 'Sum Two Numbers',
                    'description' => 'Write a program that takes two numbers as input and prints their sum.',
                ],
                [
                    'title' => 'Factorial Calculator',
                    'description' => 'Write a program to calculate the factorial of a number.',
                ],
            ];
    
            foreach ($problems as $problem) {
                Problem::create($problem);
            }
        }
}
