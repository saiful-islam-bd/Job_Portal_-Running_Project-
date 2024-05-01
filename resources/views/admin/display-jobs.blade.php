@extends('layouts.app_admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">

                {{-- save job successful alert --}}
                <div class="container text-center" style="margin-top: 10px;">
                    @if (\Session::has('job_created'))
                        <div class="alert alert-success">
                            <p style="font-size: 18px; font-weight:600; color: #08bc0b; margin-top:10px;">
                                {!! \Session::get('job_created') !!}</p>
                        </div>
                    @endif
                </div>

                {{-- save job successful alert --}}
                <div class="container text-center" style="margin-top: 10px;">
                  @if (\Session::has('delete'))
                      <div class="alert alert-success">
                          <p style="font-size: 18px; font-weight:600; color: #08bc0b; margin-top:10px;">
                              {!! \Session::get('delete') !!}</p>
                      </div>
                  @endif
              </div>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4 d-inline">Jobs</h5>
                        <a href="{{ route('create.jobs') }}" class="btn btn-primary mb-4 text-center float-right">Create
                            Jobs</a>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Job Title</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Company</th>
                                    <th scope="col">Job Region</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jobs as $job)
                                    <tr>
                                        <th scope="row">{{ $job->id }}</th>
                                        <td>{{ $job->job_title }}</td>
                                        <td>{{ $job->category }}</td>
                                        <td>{{ $job->company_name }}</td>
                                        <td>{{ $job->job_region }}</td>

                                        <td><a href="{{ route('edit.jobs', $job->id) }}"
                                            class="btn btn-warning  text-center ">Edit</a></td>

                                        <td><a href="{{ route('delete.jobs', $job->id) }}"
                                                class="btn btn-danger  text-center ">Delete</a></td>
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
