@extends('layouts.app')

@section('content')
    <section class="section-hero overlay inner-page bg-image"
        style="background-image: url({{ asset('assets/images/hero_1.jpg') }}); margin-top: -24px;" id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white font-weight-bold">Update Profile</h1>
                    <div class="custom-breadcrumbs">
                        <a href="#">Home</a> <span class="mx-2 slash">/</span>
                        <a href="#">Profile</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>Update Profile</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Profile update successful alert --}}
    <div class="container text-center" style="margin-top: 40px;">
        @if (\Session::has('update'))
            <div class="alert alert-success">
                <p style="font-size: 18px; font-weight:600; color: #08bc0b; margin-top:10px;">{!! \Session::get('update') !!}</p>
            </div>
        @endif
    </div>

    <section class="site-section">
        <div class="container">

            <div class="row mb-5">
                <div class="col-lg-2">
                </div>

                <div class="col-lg-8">

                    <div class="text-center mb-4">
                        <h2 style="font-weight: 600;">Update Profile</h2>
                    </div>

                    <form class="p-4 p-md-5 border rounded" action="{{ route('update.profile') }}" method="post">
                        @csrf
                        <!--profile details-->
                        <div class="form-group">
                            <label for="job-title">Image</label>
                            <input type="file" name="image" class="form-control" value="{{ $editProfileData->image }}"
                                placeholder="image">
                        </div>

                        {{-- error alert --}}
                        @if ($errors->has('image'))
                            <p class="alert alert-success">{{ $errors->first('image') }}</p>
                        @endif

                        <div class="form-group">
                            <label for="job-title">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $editProfileData->name }}"
                                placeholder="Name">
                        </div>

                        {{-- error alert --}}
                        @if ($errors->has('name'))
                            <p class="alert alert-success">{{ $errors->first('name') }}</p>
                        @endif

                        <div class="form-group">
                            <label for="job-title">Job Title</label>
                            <input type="text" name="job_title" class="form-control" id="job-title"
                                value="{{ $editProfileData->job_title }}" placeholder="Job Title">
                        </div>

                        {{-- error alert --}}
                        @if ($errors->has('job_title'))
                            <p class="alert alert-success">{{ $errors->first('job_title') }}</p>
                        @endif

                        <div class="form-group">
                            <label for="job-title">Facebook</label>
                            <input type="text" name="facebook" class="form-control"
                                value="{{ $editProfileData->facebook }}" placeholder="Facebook id link">
                        </div>

                        {{-- error alert --}}
                        @if ($errors->has('facebook'))
                            <p class="alert alert-success">{{ $errors->first('facebook') }}</p>
                        @endif

                        <div class="form-group">
                            <label for="job-title">Linked in</label>
                            <input type="text" name="linkedin" class="form-control"
                                value="{{ $editProfileData->linkedin }}" placeholder="Linked in id link">
                        </div>

                        {{-- error alert --}}
                        @if ($errors->has('linkedin'))
                            <p class="alert alert-success">{{ $errors->first('linkedin') }}</p>
                        @endif

                        <div class="form-group">
                            <label for="job-title">Twitter</label>
                            <input type="text" name="twitter" class="form-control"
                                value="{{ $editProfileData->twitter }}" placeholder="Twitter id link">
                        </div>

                        {{-- error alert --}}
                        @if ($errors->has('twitter'))
                            <p class="alert alert-success">{{ $errors->first('twitter') }}</p>
                        @endif



                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="">Bio</label>
                                <textarea name="bio" id="" cols="30" rows="7" class="form-control"
                                    placeholder="Describe your bio..."> {{ $editProfileData->bio }} </textarea>
                            </div>
                        </div>

                        {{-- error alert --}}
                        @if ($errors->has('bio'))
                            <p class="alert alert-success">{{ $errors->first('bio') }}</p>
                        @endif


                        <div class="col-lg-4 ml-auto">
                            <div class="row">
                                <div class="col-6">
                                    <input type="submit" name="submit" class="btn btn-block btn-primary btn-md"
                                        style="margin-left: 120px;" value="Update">
                                </div>
                            </div>
                        </div>

                    </form>

                </div>

                <div class="col-lg-2">
                </div>


            </div>

        </div>
    </section>
@endsection
