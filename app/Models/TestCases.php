<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestCases extends Model
{
    use HasFactory;
    protected $fillable=[
        'problem_id',
        'expected_output',
        'user_output',
        'error',
        'points',
    ];

    public function problem(){
        return $this->belongsTo(Problem::class);
    }
}
