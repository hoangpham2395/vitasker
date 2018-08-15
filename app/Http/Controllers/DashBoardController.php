<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Job;
use App\Category;
use App\Fboder;

class DashBoardController extends Controller
{
    public function index() 
    {
    	$users = User::all()->count();
    	$jobs = Job::all()->count();
    	$categories = Category::all()->count();
    	$fboders = Fboder::all()->count();
    	return view('dashboard.index', compact('users', 'jobs', 'categories', 'fboders'));
    }
}
