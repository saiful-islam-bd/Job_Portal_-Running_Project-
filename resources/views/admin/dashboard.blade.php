@extends('layouts.app_admin')
@section('content')

<div class="row">
    <div class="col-md-3">
      <div class="card">
        <div class="card-body" style="background-color: rgb(28, 162, 117);">
          <h5 class="card-title">Jobs</h5>
          <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
          <p class="card-text">number of jobs: {{ $jobs }}</p>
         
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card">
        <div class="card-body" style="background-color: rgb(246, 173, 48);">
          <h5 class="card-title">Applications</h5>
          
          <p class="card-text">number of applications: {{$applications}}</p>
          
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card">
        <div class="card-body" style="background-color: rgb(81, 179, 249);">
          <h5 class="card-title">Categories</h5>
          
          <p class="card-text">number of categories: {{ $categories }}</p>
          
        </div>
      </div>
    </div>
    
    <div class="col-md-3">
      <div class="card">
        <div class="card-body" style="background-color: rgb(238, 85, 85);">
          <h5 class="card-title">Admins</h5>
          
          <p class="card-text">number of admins: {{ $admins }}</p>
          
        </div>
      </div>
    </div>
   
  </div>

@endsection