<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $table = 'question_paper';
    
    protected $fillable = [
        'question_no', 'image', 'question_title', 'option_a', 'option_b', 'option_c', 'option_d', 'result_ans', 'status', 'chapter_id', 'subject_id', 'reason', 'test'
    ];
}
