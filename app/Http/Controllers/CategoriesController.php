<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Validator;
use Session;

class CategoriesController extends Controller
{
    public function index(Request $request) 
    {
    	$limit = ($request->get('limit')) ? $request->get('limit') : getConfig('PER_PAGE', 10);
    	$page = ($request->get('page')) ? $request->get('page') : getConfig('PAGE', 1);

    	$categories = Category::where(function($query) use ($request) {
                if ($categoryName = $request->get('category_name')) {
                    $query->where('category_name', 'LIKE', '%'.$categoryName.'%');
                }
            })
            ->orderBy('category_id', 'DESC')
            ->paginate($limit);
    	$count = $categories->count(); 
    	$total = $categories->total();
    	
    	return view('categories.index', compact('categories', 'count', 'total', 'limit', 'page'));
    }

    protected $_rules = [
    	'category_name' => 'required'
    ];

    public function create() 
    {
    	return view('categories.create');
    }

    public function store(Request $request) 
    {
    	$validator = Validator::make($request->all(), $this->_rules);
    	if ($validator->fails()) {
    		return redirect()->back()->withErrors($validator)->withInput();
    	}

    	Category::create($request->all());
    	Session::flash('success', 'Add new category success!');
    	return redirect('categories');
    }

    public function edit($id) 
    {
    	$category = Category::find($id);
    	return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id) 
    {
    	$validator = Validator::make($request->all(), $this->_rules);
    	if ($validator->fails()) {
    		return redirect()->back()->withErrors($validator)->withInput();
    	}

    	$category = Category::find($id);
    	$category->update($request->all());
    	Session::flash('success', 'Update success!');
    	return redirect('categories');
    }

    public function destroy($id) 
    {
    	$category = Category::find($id);
    	$category->delete();
    	Session::flash('success', 'Delete success!');
    	return redirect('categories');
    }
}
