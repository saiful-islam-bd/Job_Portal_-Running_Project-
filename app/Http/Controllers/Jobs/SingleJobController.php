<?php

namespace App\Http\Controllers\Jobs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Job\job;
use App\Models\Job\JobSaved;
use App\Models\Job\JobApply;
use App\Models\Category\Category;
use App\Models\Job\Search;
use Auth;

class SingleJobController extends Controller
{
    public function singleJobs($id)
    {
        $singleJob = Job::find($id);

        //getting related jobs
        $relatedJobs = Job::where('category', $singleJob->category)
            ->where('id', '!=', $id)
            ->take(5)
            ->get();

        $relatedJobsCount = Job::where('category', $singleJob->category)
            ->where('id', '!=', $id)
            ->take(5)
            ->count();


        //Categories
        $categories = Category::all();



        //Single job page validation
        if (auth()->user()) {
            //saved jobs
            $savedJob = JobSaved::where('singleJob_id', $id)
                ->where('user_id', Auth::user()->id)
                ->count();

            //appliedJob by meee!
            $appliedJob = JobApply::where('singleJob_id', $id)
                ->where('user_id', Auth::user()->id)
                ->count();

            return view('jobs.single-job', compact('singleJob', 'relatedJobs', 'relatedJobsCount', 'savedJob', 'appliedJob', 'categories'));
        }
        else{

            return view('jobs.single-job', compact('singleJob', 'relatedJobs', 'relatedJobsCount', 'categories'));
        }

    }

    public function saveJob(Request $request)
    {
        $saveJob = JobSaved::create([
            'singleJob_id' => $request->singleJob_id,
            'user_id' => $request->user_id,
            'singleJob_image' => $request->singleJob_image,
            'singleJob_title' => $request->singleJob_title,
            'company_name' => $request->company_name,
            'singleJob_region' => $request->singleJob_region,
            'singleJob_type' => $request->singleJob_type,
        ]);

        if ($saveJob) {
            return redirect('/jobs/single.job/' . $request->singleJob_id . '')->with('save', 'Job Saved Sccessfully!');
        }
    }


    //Job apply section
    public function applyJob(Request $request)
    {
        if (Auth::user()->cv == 'no cv') {
            return redirect('/jobs/single.job/' . $request->singleJob_id . '')->with('apply', 'First upload your cv in your profile!');
        }
        else {
            $applyJob = JobApply::create([
                'cv' => Auth::user()->cv,
                'singleJob_id' => $request->singleJob_id,
                'user_id' => Auth::user()->id,
                'singleJob_image' => $request->singleJob_image,
                'singleJob_title' => $request->singleJob_title,
                'company_name' => $request->company_name,
                'singleJob_region' => $request->singleJob_region,
                'singleJob_type' => $request->singleJob_type,
            ]);

            if ($applyJob) {
                return redirect('/jobs/single.job/' . $request->singleJob_id . '')->with('applied', 'Job Applied Successfully!');
            }
        }
    }
    



    //Search section
    public function search(Request $request)
    {
        Request()->validate([
            'job_title' => 'required',
            'job_region' => 'required',
            'job_type' => 'required',
        ]);

        Search::create([
            'keywords' => request()->job_title,
        ]);

        $job_title = $request->get('job_title');
        $job_region = $request->get('job_region');
        $job_type = $request->get('job_type');

        $searches = Job::select()
            ->where('job_title', 'like', "%$job_title%")
            ->where('job_region', 'like', "%$job_region%")
            ->where('job_type', 'like', "%$job_type%")
            ->get();

        return view('jobs.search', compact('searches'));
    }
}
