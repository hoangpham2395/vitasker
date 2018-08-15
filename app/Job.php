<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'job';
    protected $fillable = ['job_name'];
    protected $primaryKey = 'job_id';
    public $timestamps = false;
}
