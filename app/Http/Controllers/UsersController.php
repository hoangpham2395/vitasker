<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function index(Request $request) 
    {
    	$limit = ($request->get('limit')) ? $request->get('limit') : getConfig('PER_PAGE', 10);
    	$page = ($request->get('page')) ? $request->get('page') : getConfig('PAGE', 1);

    	$sortField = ($request->get('field')) ? $request->get('field') : 'user_id';
    	$sortType = ($request->get('type')) ? $request->get('type') : getConfig('SORT_TYPE', 'DESC');

    	$users = User::orderBy($sortField, $sortType)->paginate($limit);
    	$count = $users->count();
    	$total = $users->total();
    	return view('users.index', compact('users', 'count', 'total', 'limit', 'page'));
    }
}
