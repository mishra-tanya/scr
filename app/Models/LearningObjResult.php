<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearningObjResult extends Model
{
    use HasFactory;
    protected $table='lo_results';
    protected $fillable = [
        'user_id',
        'chapter_id',
        'test_series',
        'question_id',
        'user_answer',
        'correct_answer',
    ];
}
