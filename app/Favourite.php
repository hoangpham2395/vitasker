<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    protected $table = 'favorite';
    protected $fillable = ['user_id', 'oder_id', 'time_favorite'];
    protected $primaryKey = 'favorite_id';

    public function user() 
    {
    	return $this->belongsTo(\App\User::class, 'user_id');
    }

    public function fboder() 
    {
    	return $this->belongsTo(\App\Fboder::class, 'oder_id');
    }
}
