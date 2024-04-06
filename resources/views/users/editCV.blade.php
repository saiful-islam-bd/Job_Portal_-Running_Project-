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

                    <form class="p-4 p-md-5 border rounded" action="{{ route('update.cv') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <!--profile details-->

                        <div class="form-group">
                            <label for="job-title">Update CV</label>
                            <input type="file" name="cv" class="form-control">
                        </div>

                        {{-- error alert --}}
                        @if ($errors->has('cv'))
                            <p class="alert alert-success">{{ $errors->first('cv') }}</p>
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
