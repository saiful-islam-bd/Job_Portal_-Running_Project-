@extends('layouts.app')

@section('content')
    <section class="section-hero overlay inner-page bg-image"
        style="background-image: url({{ asset('assets/images/hero_1.jpg') }}); margin-top: -24px;" id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white font-weight-bold">{{ $singleJob->job_title }}</h1>
                    <div class="custom-breadcrumbs">
                        <a href="#">Home</a> <span class="mx-2 slash">/</span>
                        <a href="#">Job</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>{{ $singleJob->job_title }}</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- save job successful alert --}}
    <div class="container text-center" style="margin-top: 40px;">
        @if (\Session::has('save'))
            <div class="alert alert-success">
                <p style="font-size: 18px; font-weight:600; color: #08bc0b; margin-top:10px;">{!! \Session::get('save') !!}</p>
            </div>
        @endif
    </div>


    {{-- apply job successful alert --}}
    <div class="container text-center" style="margin-top: 40px;">
        @if (\Session::has('apply'))
            <div class="alert alert-success">
                <p style="font-size: 18px; font-weight:600; color: #08bc0b; margin-top:10px;">{!! \Session::get('apply') !!}</p>
            </div>
        @endif
    </div>

    <div class="container text-center" style="margin-top: 40px;">
        @if (\Session::has('applied'))
            <div class="alert alert-success">
                <p style="font-size: 18px; font-weight:600; color: #08bc0b; margin-top:10px;">{!! \Session::get('applied') !!}</p>
            </div>
        @endif
    </div>



    <section class="site-section">
        <div class="container">
            <div class="row align-items-center mb-5">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <div class="d-flex align-items-center">
                        <div class="border p-2 d-inline-block mr-3 rounded">
                            <img src="{{ asset('assets/images/' . $singleJob->image . '') }}" alt="Image">
                        </div>
                        <div>
                            <h2>{{ $singleJob->job_title }}</h2>
                            <div>
                                <span class="ml-0 mr-2 mb-2"><span
                                        class="icon-briefcase mr-2"></span>{{ $singleJob->company_name }}</span>
                                <span class="m-2"><span class="icon-room mr-2"></span>{{ $singleJob->job_region }}</span>
                                <span class="m-2"><span class="icon-clock-o mr-2"></span><span
                                        class="text-primary">{{ $singleJob->job_type }}</span></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8">
                        <div class="mb-5">
                            <figure class="divmb-5"><img src="{{ asset('assets/images/job_single_img_1.jpg') }}"
                                    alt="Image" class="img-fluid rounded"></figure>
                            <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span
                                    class="icon-align-left mr-3"></span>Job Description</h3>

                            <p>{!! $singleJob->job_description !!}</p>

                        </div>
                        <div class="mb-5">
                            <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span
                                    class="icon-rocket mr-3"></span>Responsibilities</h3>
                            <ul class="list-unstyled m-0 p-0">
                                {{-- <li class="d-flex align-items-start mb-2"><span
                                        class="icon-check_circle mr-2 text-muted"></span><span>{{ $singleJob->responsibilities }}</span>
                                </li> --}}
                                <p>{{ $singleJob->responsibilities }}</p>
                             
                            </ul>
                        </div>

                        <div class="mb-5">
                            <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span
                                    class="icon-book mr-3"></span>Education + Experience</h3>
                            <ul class="list-unstyled m-0 p-0">
                                <li class="d-flex align-items-start mb-2"><span
                                        class="icon-check_circle mr-2 text-muted"></span><span>Necessitatibus quibusdam
                                        facilis</span></li>
                                <li class="d-flex align-items-start mb-2"><span
                                        class="icon-check_circle mr-2 text-muted"></span><span>Velit unde aliquam et
                                        voluptas reiciendis non sapiente labore</span></li>
                                <li class="d-flex align-items-start mb-2"><span
                                        class="icon-check_circle mr-2 text-muted"></span><span>Commodi quae ipsum quas est
                                        itaque</span></li>
                                <li class="d-flex align-items-start mb-2"><span
                                        class="icon-check_circle mr-2 text-muted"></span><span>Lorem ipsum dolor sit amet,
                                        consectetur adipisicing elit</span></li>
                                <li class="d-flex align-items-start mb-2"><span
                                        class="icon-check_circle mr-2 text-muted"></span><span>Deleniti asperiores
                                        blanditiis nihil quia officiis dolor</span></li>
                            </ul>
                        </div>

                        <div class="mb-5">
                            <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span
                                    class="icon-turned_in mr-3"></span>Other Benifits</h3>
                            <ul class="list-unstyled m-0 p-0">
                                <li class="d-flex align-items-start mb-2"><span
                                        class="icon-check_circle mr-2 text-muted"></span><span>Necessitatibus quibusdam
                                        facilis</span></li>
                                <li class="d-flex align-items-start mb-2"><span
                                        class="icon-check_circle mr-2 text-muted"></span><span>Velit unde aliquam et
                                        voluptas reiciendis non sapiente labore</span></li>
                                <li class="d-flex align-items-start mb-2"><span
                                        class="icon-check_circle mr-2 text-muted"></span><span>Commodi quae ipsum quas est
                                        itaque</span></li>
                                <li class="d-flex align-items-start mb-2"><span
                                        class="icon-check_circle mr-2 text-muted"></span><span>Lorem ipsum dolor sit amet,
                                        consectetur adipisicing elit</span></li>
                                <li class="d-flex align-items-start mb-2"><span
                                        class="icon-check_circle mr-2 text-muted"></span><span>Deleniti asperiores
                                        blanditiis nihil quia officiis dolor</span></li>
                            </ul>
                        </div>

                        <div class="row mb-5">
                            <div class="col-6">

                                <form action="{{ route('save.job') }}" method="POST">
                                    @csrf
                                    <input name="singleJob_id" type="hidden" value="{{ $singleJob->id }}">
                                    <input name="user_id" type="hidden" value="{{ Auth::user()->id }}">
                                    <input name="singleJob_image" type="hidden" value="{{ $singleJob->image }}">
                                    <input name="singleJob_title" type="hidden" value="{{ $singleJob->job_title }}">
                                    <input name="company_name" type="hidden" value="{{ $singleJob->company_name }}">
                                    <input name="singleJob_region" type="hidden" value="{{ $singleJob->job_region }}">
                                    <input name="singleJob_type" type="hidden" value="{{ $singleJob->job_type }}">

                                    @if ($savedJob > 0)
                                        <button class="btn btn-block btn-dark btn-md" disabled><i class="icon-heart"></i>
                                            Job Saved</button>
                                    @else
                                        <button name="submit" type="submit"
                                            class="btn btn-block btn-primary btn-md">Save
                                            Job</button>
                                    @endif

                                </form>

                            </div>

                            <div class="col-6">
                                {{-- Apply Form --}}
                                <form action="{{ route('apply.job') }}" method="POST">
                                    @csrf
                                    <input name="singleJob_id" type="hidden" value="{{ $singleJob->id }}">
                                    {{-- <input name="user_id" type="hidden" value="{{ Auth::user()->id }}"> --}}
                                    <input name="singleJob_image" type="hidden" value="{{ $singleJob->image }}">
                                    <input name="singleJob_title" type="hidden" value="{{ $singleJob->job_title }}">
                                    <input name="company_name" type="hidden" value="{{ $singleJob->company_name }}">
                                    <input name="singleJob_region" type="hidden" value="{{ $singleJob->job_region }}">
                                    <input name="singleJob_type" type="hidden" value="{{ $singleJob->job_type }}">

                                    {{-- <button name="submit" type="submit" class="btn btn-block btn-primary btn-md">Apply Job</button> --}}

                                    @if ($appliedJob > 0)
                                        <button class="btn btn-block btn-dark btn-md" disabled><i class="icon-done"></i>
                                            Job Applied Successfully!</button>
                                    @else
                                        <button name="submit" type="submit"
                                            class="btn btn-block btn-primary btn-md">Apply
                                            Job</button>
                                    @endif

                                </form>


                            </div>

                        </div>

                    </div>

                    <div class="col-lg-4">
                        <div class="bg-light p-3 border rounded mb-4">
                            <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Job Summary</h3>
                            <ul class="list-unstyled pl-3 mb-0">
                                <li class="mb-2"><strong class="text-black">Published on:
                                    </strong>{{ $singleJob->created_at }} </li>
                                <li class="mb-2"><strong class="text-black">Vacancy: </strong>{{ $singleJob->vacancy }}
                                </li>
                                <li class="mb-2"><strong class="text-black">Employment Status:
                                    </strong>{{ $singleJob->job_type }}</li>
                                <li class="mb-2"><strong class="text-black">Experience:
                                    </strong>{{ $singleJob->experience }}</li>
                                <li class="mb-2"><strong class="text-black">Job Location: </strong>
                                    {{ $singleJob->job_region }}</li>
                                <li class="mb-2"><strong class="text-black">Salary: </strong> {{ $singleJob->salary }}
                                </li>
                                <li class="mb-2"><strong class="text-black">Gender: </strong> {{ $singleJob->gender }}
                                </li>
                                <li class="mb-2"><strong class="text-black">Application Deadline:
                                    </strong>{{ $singleJob->application_deadline }}</li>
                            </ul>
                        </div>
                        {{-- Social media share link  --}}
                        <div class="bg-light p-3 mb-4 border rounded">
                            <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Share</h3>
                            <div class="px-3">

                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('single.job', $singleJob->id) }}&quote={{ $singleJob->job_title }}"
                                    class="pt-3 pb-3 pr-3 pl-0"><span class="icon-facebook"></span></a>

                                <a href="https://twitter.com/intent/tweet?text={{ $singleJob->job_title }}&url={{ route('single.job', $singleJob->id) }}"
                                    class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>

                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ route('single.job', $singleJob->id) }}"
                                    class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>

                            </div>
                        </div>

                        {{-- Categories section --}}
                        <div class="bg-light p-3 border rounded mb-4">
                            <h3 class="mt-3 h5 pl-3 mb-3 "><i class="icon-tags"></i> Categories</h3>

                            <ul class="list-unstyled pl-3 mb-0">

                                @foreach ($categories as $category)
                                    <li class="mb-2"><a href="{{ route('categories.job', $category->name) }}" > {{ $category->name }} </a> </li>
                                @endforeach

                            </ul>
                        </div>

                    </div>
                </div>




            </div>
    </section>


    <section class="site-section" id="next">
        <div class="container">

            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="section-title mb-2"> <span style="color: #89ba16;">{{ $relatedJobsCount }}</span> Related
                        Jobs</h2>
                </div>
            </div>

            <ul class="job-listings mb-5">

                @foreach ($relatedJobs as $singleJob)
                    <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                        <a href="{{ route('single.job', $singleJob->id) }}"></a>
                        <div class="job-listing-logo">
                            <img src="{{ asset('assets/images/' . $singleJob->image . '') }} " alt="Image"
                                class="img-fluid">
                        </div>

                        <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                            <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                                <h2>{{ $singleJob->job_title }}</h2>
                                <strong>{{ $singleJob->company_name }}</strong>
                            </div>
                            <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                                <span class="icon-room"></span> {{ $singleJob->job_region }}
                            </div>
                            <div class="job-listing-meta">
                                <span class="badge badge-danger">{{ $singleJob->job_type }}</span>
                            </div>
                        </div>
                    </li>
                @endforeach

            </ul>

        </div>
    </section>



    <section class="pt-5 bg-image overlay-primary fixed overlay"
        style="background-image: url({{ asset('assets/images/hero_1.jpg') }}); margin-bottom: -24px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 align-self-center text-center text-md-left mb-5 mb-md-0">
                    <h2 class="text-white">Get The Mobile Apps</h2>
                    <p class="mb-5 lead text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit tempora
                        adipisci impedit.</p>
                    <p class="mb-0">
                        <a href="#" class="btn btn-dark btn-md px-4 border-width-2"><span
                                class="icon-apple mr-3"></span>App Store</a>
                        <a href="#" class="btn btn-dark btn-md px-4 border-width-2"><span
                                class="icon-android mr-3"></span>Play Store</a>
                    </p>
                </div>
                <div class="col-md-6 ml-auto align-self-end">
                    <img src="{{ asset('assets/images/apps.png') }}" alt="Image" class="img-fluid">
                </div>
            </div>
        </div>
    </section>


@endsection
