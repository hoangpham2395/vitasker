<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use Validator;
use Session;

class JobsController extends Controller
{
    public function index(Request $request) 
    {
    	$limit = ($request->get('limit')) ? $request->get('limit') : getConfig('PER_PAGE', 10);
    	$page = ($request->get('page')) ? $request->get('page') : getConfig('PAGE', 1);

    	$jobs = Job::where(function ($query) use ($request) {
                if($jobName = $request->get('job_name')) {
                    $query->where('job_name', 'LIKE', '%'.$jobName.'%');
                }
            })
            ->orderBy('job_id', 'DESC')
            ->paginate($limit);
    	$count = $jobs->count(); 
    	$total = $jobs->total();
    	
    	return view('jobs.index', compact('jobs', 'count', 'total', 'limit', 'page'));
    }

    protected $_rules = [
    	'job_name' => 'required'
    ];

    public function create() 
    {
    	return view('jobs.create');
    }

    public function store(Request $request) 
    {
    	$validator = Validator::make($request->all(), $this->_rules);
    	if ($validator->fails()) {
    		return redirect()->back()->withErrors($validator)->withInput();
    	}

    	Job::create($request->all());
    	Session::flash('success', 'Add new job success!');
    	return redirect('jobs');
    }

    public function edit($id) 
    {
    	$job = Job::find($id);
    	return view('jobs.edit', compact('job'));
    }

    public function update(Request $request, $id) 
    {
    	$validator = Validator::make($request->all(), $this->_rules);
    	if ($validator->fails()) {
    		return redirect()->back()->withErrors($validator)->withInput();
    	}

    	$job = Job::find($id);
    	$job->update($request->all());
    	Session::flash('success', 'Update success!');
    	return redirect('jobs');
    }

    public function destroy($id) 
    {
    	$job = Job::find($id);
    	$job->delete();
    	Session::flash('success', 'Delete success!');
    	return redirect('jobs');
    }
}
