<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Job\Job;
use App\Models\Category\Category;


use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


//commented by me

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jobs = Job::select()->take(5)->orderby('id', 'desc')->get();
        $totalJobs = Job::all()->count();

        $categories = Category::select()->count();

        $companies = Job::select('company_name')->count();

        //trending jobs
        $keywords = DB::table('searches')->select('keywords', DB::raw('Count(*) as `count`'))->groupby('keywords')->havingRaw('Count(*) > 0')->orderby('count', 'desc')->take(3)->get();

        return view('home', compact('jobs', 'totalJobs', 'keywords', 'categories', 'companies'));
    }

    public function about()
    {
        return view('pages/about');
    }

    public function contact()
    {
        return view('pages/contact');
    }
    
}
