<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearningObj extends Model
{
    use HasFactory;
    protected $table = 'lo_question_paper';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'question_no',
        'image',
        'question_title',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'result_ans',
        'status',
        'chapter_id',
        'subject_id',
        'reason',
        'test'
    ];
}
