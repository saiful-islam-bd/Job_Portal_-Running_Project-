<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Job\JobApply;
use App\Models\Job\JobSaved;
use Auth;
use File;

class UsersController extends Controller
{
    public function profile()
    {
        $profile = User::find(Auth::user()->id);

        return view('users.profile', compact('profile'));
    }

    public function applications()
    {
        $applications = JobApply::where('user_id', '=', Auth::user()->id)
            ->take(100)
            ->orderby('created_at', 'desc')
            ->get();

        return view('users.applications', compact('applications'));
    }

    public function savedJobs()
    {
        $savedJobs = JobSaved::where('user_id', '=', Auth::user()->id)
            ->take(100)
            ->orderby('created_at', 'desc')
            ->get();

        return view('users.savedJobs', compact('savedJobs'));
    }

    public function editProfile()
    {
        $editProfileData = User::find(Auth::user()->id);

        return view('users.editProfile', compact('editProfileData'));
    }

    public function updateProfile(Request $request)
    {
        
        Request()->validate([
            "name" => "required|max:200",
            'job_title' => "required|max:200",
            "facebook" => "required|max:500",
            "linkedin" => "required|max:500",
            'twitter' => "required|max:500",
            "bio" => "required",
            "image" => "required",
        ]);



        $updateProfileDetails = User::find(Auth::user()->id);
        $updateProfileDetails->update([
            'name' => $request->name,
            'image' => $request->image,
            'job_title' => $request->job_title,
            'bio' => $request->bio,
            'facebook' => $request->facebook,
            'linkedin' => $request->linkedin,
            'twitter' => $request->twitter,
            // 'cv' => $request->cv,
        ]);

        if ($updateProfileDetails) {
            return redirect('/users/profile')->with('update', 'Profile Updated Sccessfully!');
        }
    }


    public function editCV() {

        return view('users.editCV');
    }


    public function updateCV(Request $request) {

        Request()->validate([
            "cv" => "required",
        ]);


        $oldCV = User::find(Auth::user()->id);

        if(File::exists(public_path('assets/Cvs/'.$oldCV->cv))){
            File::delete(public_path('assets/Cvs/'.$oldCV->cv));
        }
        else{
            //dd('file doesn't exists');
        }

        $destinationPath = 'assets/Cvs/';
        $myCV = $request->cv->getClientOriginalName();
        $request->cv->move(public_path($destinationPath), $myCV);


        $oldCV->update([
            "cv" => $myCV
        ]);

        return redirect('/users/profile')->with('update', 'CV updated successfully');

    }
      
}
