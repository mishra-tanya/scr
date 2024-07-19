<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flash extends Model
{
    use HasFactory;
    protected $table = 'flash';

    protected $fillable = [
        'title',
        'front',
        'back',
        'page_url'
    ];
}
