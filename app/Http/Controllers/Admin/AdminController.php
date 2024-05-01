<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Admin;
use App\Models\Job\Job;
use App\Models\Job\JobApply;
use App\Models\Category\Category;

use Illuminate\Support\Facades\Hash;

use Auth;

class AdminController extends Controller
{
    public function viewLogin()
    {
        return view('admin.view-login');
    }

    public function checkLogin(Request $request)
    {
        $remember_me = $request->has('remember_me') ? true : false;

        if (
            auth()
                ->guard('admin')
                ->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $remember_me)
        ) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()
            ->back()
            ->with(['error' => 'Error logging in!!! Try again correctly.']);

        //   $remember_me = $request->has('remember_me') ? true : false;

        //   if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {

        //       return redirect('/admin');
        //   }
        //   else {

        //   return redirect()->back()->with(['error' => 'error logging in']);
        // }
    }

    public function dashboard()
    {
        $jobs = Job::select()->count();

        $applications = JobApply::select()->count();

        $categories = Category::select()->count();

        $admins = Admin::select()->count();

        return view('admin.dashboard', compact('jobs', 'applications', 'categories', 'admins'));
    }

    public function admins()
    {
        $allAdmins = Admin::all();

        return view('admin.all-admins', compact('allAdmins'));
    }

    public function createAdmins()
    {
        return view('admin.create-admins');
    }

    public function storeAdmins(Request $request)
    {
        Request()->validate([
            'name' => 'required|max:200',
            'email' => 'required|max:500',
            'password' => 'required|max:500',
        ]);

        $createAdmins = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($createAdmins) {
            return redirect('/admin/all_admins')->with('create', 'New Admin Created Sccessfully!');
        }
    }

    public function deleteAdmins($id){

        $deleteAdmin = Admin::find($id);
        $deleteAdmin->delete();

        if ($deleteAdmin) {
            return redirect('/admin/all_admins')->with('delete', 'Admin Deleted Sccessfully!');
        }


    }

    public function displayCategories()
    {
        $displayCategories = Category::all();

        return view('admin.display-categories', compact('displayCategories'));
    }

    public function createCategories()
    {
        return view('admin.create-categories');
    }

    public function storeCategories(Request $request)
    {
        Request()->validate([
            'name' => 'required|max:300',
        ]);

        $createCategories = Category::create([
            'name' => $request->name,
        ]);

        if ($createCategories) {
            return redirect('/admin/display_categories')->with('created_category', 'New Category Created Successfully!');
        }
    }

    public function editCategories($id)
    {
        $category = Category::find($id);

        return view('admin.edit-categories', compact('category'));
    }

    public function updateCategories(Request $request, $id)
    {
        Request()->validate([
            'name' => 'required|max:300',
        ]);

        $updateCategories = Category::find($id);
        $updateCategories->update([
            'name' => $request->name,
        ]);

        if ($updateCategories) {
            return redirect('/admin/display_categories')->with('updated', 'Category Updated Successfully!');
        }
    }

    public function deleteCategories($id)
    {
        $deleteCategory = Category::find($id);
        $deleteCategory->delete();

        if ($deleteCategory) {
            return redirect('/admin/display_categories')->with('delete', 'Category Deleted Successfully!');
        }
    }

    //jobs secton
    public function displayJobs()
    {
        $jobs = Job::all();

        return view('admin.display-jobs', compact('jobs'));
    }

    public function createJobs()
    {
        $categories = Category::all();

        return view('admin.create-jobs', compact('categories'));
    }

    public function storeJobs(Request $request)
    {
        // Request()->validate([
        //     'name' => 'required|max:300',
        //     // 'image' => 'required',
        //     'job_title' => 'required|max:500',
        //     'category' => 'required|max:500',
        //     'company_name' => 'required|max:500',
        //     'job_region' => 'required|max:500',
        //     'job_type' => 'required|max:500',
        //     'vacancy' => 'required|max:500',
        //     'experience' => 'required|max:500',
        //     'salary' => 'required|max:500',
        //     'gender' => 'required|max:500',
        //     'application_deadline' => 'required|max:500',
        //     'job_description' => 'required|max:500',
        //     'responsibilities' => 'required|max:500',
        //     'education_experience' => 'required|max:500',
        //     'other_benifits' => 'required|max:500',
 
        // ]);

        $destinationPath = 'assets/images/';
        $companyImage = $request->image->getClientOriginalName();
        $request->image->move(public_path($destinationPath), $companyImage);

        $createJobs = Job::create([
            'image' => $companyImage,
            'job_title' => $request->job_title,
            'category' => $request->category,
            'company_name' => $request->company_name,
            'job_region' => $request->job_region,
            'job_type' => $request->job_type,
            'vacancy' => $request->vacancy,
            'experience' => $request->experience,
            'salary' => $request->salary,
            'gender' => $request->gender,
            'application_deadline' => $request->application_deadline,
            'job_description' => $request->job_description,
            'responsibilities' => $request->responsibilities,
            'education_experience' => $request->education_experience,
            'other_benifits' => $request->other_benifits,
        ]);

        if($createJobs) {
            return redirect('/admin/display_jobs')->with('job_created', 'New Job Created Successfully!');
        }
    }


    //update jobs  
    public function editJobs($id)
    {
        $editJob = Job::find($id);

        $categories = Category::all();

        return view('admin.edit-jobs', compact('editJob', 'categories'));
    }



    public function updateJobs(Request $request, $id)
    {
        // Request()->validate([
        //     'name' => 'required|max:300',
        // ]);

        $destinationPath = 'assets/images/';
        $companyImage = $request->image->getClientOriginalName();
        $request->image->move(public_path($destinationPath), $companyImage);

        $updateJobs = Job::find($id);
        $updateJobs->update([
            'image' => $companyImage,
            'job_title' => $request->job_title,
            'category' => $request->category,
            'company_name' => $request->company_name,
            'job_region' => $request->job_region,
            'job_type' => $request->job_type,
            'vacancy' => $request->vacancy,
            'experience' => $request->experience,
            'salary' => $request->salary,
            'gender' => $request->gender,
            'application_deadline' => $request->application_deadline,
            'job_description' => $request->job_description,
            'responsibilities' => $request->responsibilities,
            'education_experience' => $request->education_experience,
            'other_benifits' => $request->other_benifits,
        ]);

        if ($updateJobs) {
            return redirect('/admin/display_jobs')->with('updated', 'Jobs Updated Successfully!');
        }
    }

  
   

     //delete jobs
    public function deleteJobs($id){

        $deleteJobs = Job::find($id);
        $deleteJobs->delete();

        if($deleteJobs){
            return redirect('/admin/display_jobs')->with('delete', 'Job Deleted Successfully!');
        }

    }

    

    public function displayApplications(){

        $displayApplications = JobApply::all();

        return view('admin.display-applications', compact('displayApplications'));
    }

    

    public function deleteApplications($id){

        $deleteApplications = JobApply::find($id);
        $deleteApplications->delete();

        if($deleteApplications){
            return redirect('/admin/display_applications')->with('delete', 'Job Application Deleted Successfully!');
        }

    }
    
}
