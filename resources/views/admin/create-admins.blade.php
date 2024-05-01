@extends('layouts.app_admin')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-10">

                <div class="card">
                    <div class="card-body" style="padding: 30px !important;">
                        <h5 class="card-title mb-5 d-inline">Create Admins</h5>

                        <form method="POST" action="{{ route('store.admins') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-outline mb-4 mt-4">
                                <input type="text" name="name" id="form2Example1" class="form-control"
                                    placeholder="Name" />
                            </div>
                            {{-- error alert --}}
                            @if ($errors->has('name'))
                                <p class="alert alert-danger">{{ $errors->first('name') }}</p>
                            @endif

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" name="email" id="form2Example1" class="form-control"
                                    placeholder="Email" />
                            </div>
                            {{-- error alert --}}
                            @if ($errors->has('email'))
                                <p class="alert alert-danger">{{ $errors->first('email') }}</p>
                            @endif


                            <div class="form-outline mb-4">
                                <input type="password" name="password" id="form2Example1" class="form-control"
                                    placeholder="Password" />
                            </div>
                            {{-- error alert --}}
                            @if ($errors->has('password'))
                                <p class="alert alert-danger">{{ $errors->first('password') }}</p>
                            @endif

                            <!-- Submit button -->
                            <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Create Admin</button>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
