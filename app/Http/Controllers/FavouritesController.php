<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Favourite;

class FavouritesController extends Controller
{
    public function index(Request $request) 
    {
    	$limit = ($request->get('limit')) ? $request->get('limit') : getConfig('PER_PAGE', 10);
    	$page = ($request->get('page')) ? $request->get('page') : getConfig('PAGE', 1);

    	$favourites = Favourite::with(['user', 'fboder'])
    		->join('user', 'user.user_id', '=', 'favorite.user_id')
    		->orderBy('oder_id', 'DESC')
    		->paginate($limit);
    	$count = $favourites->count(); 
    	$total = $favourites->total();
    	
    	return view('favourites.index', compact('favourites', 'count', 'total', 'limit', 'page'));
    }
}
