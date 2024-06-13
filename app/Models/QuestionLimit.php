<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionLimit extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'chapter',
        'question_limit',
    ];
}
