@extends('layouts.app')

@section('content')

    <section class="section-hero overlay inner-page bg-image"
        style="background-image: url({{ asset('assets/images/hero_1.jpg') }}); margin-top: -24px;" id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white font-weight-bold">Saved Jobs</h1>
                    <div class="custom-breadcrumbs">
                        <a href="#">Home</a> <span class="mx-2 slash">/</span>
                        <a href="#">Job</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>Saved Jobs</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="site-section">
        <div class="container">

            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="section-title mb-2">Saved Jobs</h2>
                </div>
            </div>

            @if ($savedJobs->count() > 0)

                @foreach ($savedJobs as $job)

                    <ul class="job-listings">
                        <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                            <a href="{{ route('single.job', $job->id) }}"></a>
                            <div class="job-listing-logo">
                                <img src="{{ asset('assets/images/' . $job->singleJob_image . '') }} "
                                    alt="Free Website Template by Free-Template.co" class="img-fluid">
                            </div>

                            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                                <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                                    <h2>{{ $job->singleJob_title }}</h2>
                                    <strong>{{ $job->company_name }}</strong>
                                </div>
                                <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                                    <span class="icon-room"></span>{{ $job->singleJob_region }}
                                </div>
                                <div class="job-listing-meta">
                                    <span class="badge badge-success">{{ $job->singleJob_type }}</span>
                                </div>
                            </div>

                        </li>
                    </ul>
                @endforeach

            @else
                {{-- NO job alert --}}

                <div class="container text-center" style="margin-top: 40px;">
                    <div class="alert alert-success">
                        <p style="font-size: 18px; font-weight:600; color: #08bc0b; margin-top:10px;">
                            No job is available at this category right now!</p>
                    </div>
                </div>
                
            @endif




        </div>
    </section>




@endsection
