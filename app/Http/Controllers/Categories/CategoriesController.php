<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category\Category;
use App\Models\Job\Job;


class CategoriesController extends Controller
{
   
    public function categoryJobs($name) {

        $cjobs = Job::where('category', $name)
        ->take(5)
        ->orderby('created_at', 'desc')
        ->get();

        return view('categories.category-job', compact('cjobs', 'name'));
    }

}
