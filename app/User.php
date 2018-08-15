<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';
    protected $fillable = [
        'user_name', 'url_facebook', 'user_phone', 'user_city', 'user_email', 'user_kind', 'user_job', 'user_sex', 'user_birth'
    ];
    protected $primaryKey = 'user_id';
}
