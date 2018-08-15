<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    protected $fillable = ['username', 'password', 'level'];
    protected $primaryKey = 'ID';
    protected $hidden = ['password', 'remember_token'];
}
