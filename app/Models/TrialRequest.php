<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrialRequest extends Model
{
    use HasFactory;
    protected $table = 'trial_requests';
    protected $fillable = [
        'id',
        'email',
        'trial_days',
        'approved'
    ];
    public function regUser()
    {
        return $this->belongsTo(Reg_User::class, 'email', 'email');
    }
}
