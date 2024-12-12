<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description',  'expected_output'];

    public function submissions(){
        return $this->hasMany(Submission::class);
    }
    public function testCases(){
        return $this->hasMany(TestCases::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class,'category_problem');
    }
    public function userProblemStatuses(){
        return $this->belongsToMany(Problem::class,'user_problem_status');
    }
}
