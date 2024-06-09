<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class Reg_User extends Authenticatable
{
    use Notifiable;
    protected $table = 'reg_users';
    protected $fillable = [
        'first_name', 'last_name', 'address', 'country', 'designation', 'email', 'password', 'is_admin',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
