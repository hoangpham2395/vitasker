<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fboder extends Model
{
    protected $table = 'fboders';
    protected $fillable = [
    	'message', 'category_id', 'job_id', 'postLink', 'postBy', 'postWall', 'phoneNumber', 'email', 'address', 'linkGroup', 'byGroup', 'postDate', 'image', 'count_approach', 'user_id'
    ];
    protected $primaryKey = 'oder_id';
    public $timestamps = false;

    public function category() 
    {
    	return $this->belongsTo('App\Category', 'category_id');
    }

    public function job() 
    {
    	return $this->belongsTo('App\Job', 'job_id');
    }
}
