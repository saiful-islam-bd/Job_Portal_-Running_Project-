@extends('layouts.app_admin')
@section('content')

<div class="container-fluid">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title mb-4 d-inline">Edit Jobs</h5>

            <form class="p-4 p-md-5" method="POST" action="{{ route('update.jobs', $editJob->id ) }}" enctype="multipart/form-data">
                @csrf

              <!--job details-->
              <div class="form-group">
                <label for="job-location">Images</label>
                <input name="image" type="file" class="form-control">
              </div>

              <div class="form-group">
                <label for="job-title">Job Title</label>
                <input type="text" name="job_title" class="form-control" id="job-title"
                value="{{ $editJob->job_title }}" placeholder="Job Title">
              </div>

              <div class="form-group">
                <label for="job-type">Categroy</label>
                <select name="category" class="selectpicker border rounded form-control " id="" data-style="btn-black"
                  data-width="100%" data-live-search="true" title="Select Gender">

                  @foreach ($categories as $category)
                  <option value="{{ $category->name }}">{{ $category->name }}</option>
                  @endforeach
                  
                </select>
              </div>

              <div class="form-group">
                <label for="job-title">Job Region</label>
                <input type="text" name="job_region" class="form-control" id=""
                value="{{ $editJob->job_region }}" placeholder="Job Region">
              </div>


              <div class="form-group">
                <label for="job-title">Company</label>
                <input type="text" name="company_name" class="form-control" id="job-title"
                value="{{ $editJob->company_name }}" placeholder="company">
              </div>

              <div class="form-group">
                <label for="job-type">Job Type</label>
                <select name="job_type" class="selectpicker border rounded form-control" id="job-type"
                  data-style="btn-black" data-width="100%" data-live-search="true" title="Select Job Type">
                  <option value="Part Time">Part Time</option>
                  <option value="Full Time">Full Time</option>
                </select>
              </div>
              <div class="form-group">
                <label for="job-location">Vacancy</label>
                <input name="vacancy" type="text" class="form-control" id="job-location" 
                value="{{ $editJob->vacancy }}" placeholder="e.g. 3">
              </div>

              <div class="form-group">
                <label for="job-location">Experience</label>
                <input name="experience" type="text" class="form-control" id="" 
                value="{{ $editJob->experience }}" placeholder="Experience(years)">
              </div>

              <div class="form-group">
                <label for="job-location">Salary</label>
                <input name="salary" type="text" class="form-control" id="" value="{{ $editJob->salary }}" placeholder="Sallery">
              </div>
              
             
              <div class="form-group">
                <label for="job-type">Gender</label>
                <select name="gender" class="selectpicker border rounded form-control " id="" data-style="btn-black"
                  data-width="100%" data-live-search="true" title="Select Gender">
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                  <option value="Any">Any</option>
                </select>
              </div>

              <div class="form-group">
                <label for="job-location">Application Deadline</label>
                <input name="application_deadline" type="text" class="form-control" id=""
                value="{{ $editJob->application_deadline }}"  placeholder="e.g. 20-12-2022">
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="">Job Description</label>
                  <textarea name="job_description" id="" cols="30" rows="7" class="form-control"
                  value="{{ $editJob->job_description }}"  placeholder="Write Job Description..."></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="">Responsibilities</label>
                  <textarea name="responsibilities" id="" cols="30" rows="7" class="form-control"
                  value="{{ $editJob->responsibilities }}"  placeholder="Write Responsibilities..."></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="">Education & Experience</label>
                  <textarea name="education_experience" id="" cols="30" rows="7" class="form-control"
                  value="{{ $editJob->education_experience }}" placeholder="Write Education & Experience..."></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="">Other Benifits</label>
                  <textarea name="other_benifits" id="" cols="30" rows="7" class="form-control"
                  value="{{ $editJob->other_benifits }}"  placeholder="Write Other Benifits..."></textarea>
                </div>
              </div>

              <!--company details-->

              <div class="col-lg-4 ml-auto">
                <div class="row">
                  <div class="col-6">
                    <input type="submit" name="submit" class="btn btn-block btn-primary btn-md"
                      style="margin-left: 155px; margin-top: 20px;" value="Update">
                  </div>
                </div>
              </div>


            </form>
          </div>
        </div>
      </div>
    </div>

  </div>

@endsection