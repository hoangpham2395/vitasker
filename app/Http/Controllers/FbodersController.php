<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fboder;
use App\Category;
use App\Job;
use Validator;
use Session;

class FbodersController extends Controller
{
    protected function _getListCategories() 
    {
        return Category::all()->pluck('category_name', 'category_id');
    }

    protected function _getListJobs() 
    {
        return Job::all()->pluck('job_name', 'job_id');
    }

    public function index(Request $request) 
    {
    	$limit = ($request->get('limit')) ? $request->get('limit') : getConfig('PER_PAGE', 10);
    	$page = ($request->get('page')) ? $request->get('page') : getConfig('PAGE', 1);

    	$fboders = Fboder::with(['category', 'job'])
    		->where(function($query) use ($request) {
    			if ($categoryId = $request->get('category_id')) {
    				$query->where('category_id', '=', $categoryId);
    			}
    			if ($jobId = $request->get('job_id')) {
    				$query->where('job_id', '=', $jobId);
    			}
    			if ($postBy = $request->get('postBy')) {
    				$query->where('postBy', 'LIKE', '%'.$postBy.'%');
    			}
    			if ($phoneNumber = $request->get('phoneNumber')) {
    				$query->where('phoneNumber', 'LIKE', '%'.$phoneNumber.'%');
    			}
    			if ($email = $request->get('email')) {
    				$query->where('email', 'LIKE', '%'.$email.'%');
    			}
    			if ($address = $request->get('address')) {
    				$query->where('address', 'LIKE', '%'.$address.'%');
    			}
    		})
    		->orderBy('oder_id', 'DESC')
    		->paginate($limit);
    	$count = $fboders->count(); 
    	$total = $fboders->total();

    	$categories = $this->_getListCategories();
    	$jobs = $this->_getListJobs();
    	
    	return view('fboders.index', compact('fboders', 'count', 'total', 'limit', 'page', 'categories', 'jobs'));
    }

    protected $_rules = [
    	'message' => 'required', 
    	'category_id' => 'required|numeric', 
    	'job_id' => 'required|numeric', 
    	'postBy' => 'required',
    	'address' => 'required'
    ];

    public function create() 
    {
        $categories = $this->_getListCategories();
        $jobs = $this->_getListJobs();

    	return view('fboders.create', compact('categories', 'jobs'));
    }

    public function store(Request $request) 
    {
    	$validator = Validator::make($request->all(), $this->_rules);
    	if ($validator->fails()) {
    		return redirect()->back()->withErrors($validator)->withInput();
    	}

    	Fboder::create($request->all());
    	Session::flash('success', 'Add new job success!');
    	return redirect('fboders');
    }

    public function edit($id) 
    {
        $categories = $this->_getListCategories();
        $jobs = $this->_getListJobs();
    	$fboder = Fboder::find($id);

    	return view('fboders.edit', compact('fboder', 'categories', 'jobs'));
    }

    public function update(Request $request, $id) 
    {
    	$validator = Validator::make($request->all(), $this->_rules);
    	if ($validator->fails()) {
    		return redirect()->back()->withErrors($validator)->withInput();
    	}

    	$fboder = Fboder::find($id);
    	$fboder->update($request->all());
    	Session::flash('success', 'Update success!');
    	return redirect('fboders');
    }

    public function destroy($id) 
    {
    	$fboder = Fboder::find($id);
    	$fboder->delete();
    	Session::flash('success', 'Delete success!');
    	return redirect('fboders');
    }
}
