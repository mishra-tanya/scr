<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlashTest extends Model
{
    use HasFactory;
    protected $table = 'flash_test';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'url_id',
        'title',
        'url',
        'chapter'
    ];
}
