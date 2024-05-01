@extends('layouts.app_admin')
@section('content')

<div class="container-fluid">

    <div class="row">
      <div class="col">

        {{-- save job successful alert --}}
        <div class="container text-center" style="margin-top: 40px;">
            @if (\Session::has('delete'))
                <div class="alert alert-success">
                    <p style="font-size: 18px; font-weight:600; color: #08bc0b; margin-top:10px;">
                        {!! \Session::get('delete') !!}</p>
                </div>
            @endif
        </div>

        <div class="card">
          <div class="card-body">
            <h5 class="card-title " style="margin-bottom: 15px;">Job Applications</h5>

            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">cv</th>
                  <th scope="col">job_id</th>
                  <th scope="col">job_title</th>
                  <th scope="col">company</th>
                  <th scope="col">Delete</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($displayApplications as $applications)
                <tr>
                    <th scope="row">{{ $applications->id }}</th>
                    <td><a class="btn btn-success" href="#">{{ $applications->cv }}</a></td>
                    <td>{{ $applications->singleJob_id }}</td>
                    <td>{{ $applications->singleJob_title }}</td>
                    <td>{{ $applications->company_name }}</td>
                    <td><a href="{{ route('delete.applications', $applications->id )}}" class="btn btn-danger  text-center ">Delete</a></td>
                  </tr>
                
                @endforeach
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>

@endsection