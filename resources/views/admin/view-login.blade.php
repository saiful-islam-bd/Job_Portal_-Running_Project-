@extends('layouts.app_admin')
@section('content')
    <div class="row">
        <div class="col" style="max-width: 80%;">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mt-4 mb-4 text-center" style="font-weight: 600; font-size:28px;">Admin Login</h5>

                    @if (session()->has('error'))
                        <p class="alert alert-danger"> {{ session()->get('error') }}</p>
                    @endif

                    <form method="POST" action="{{ route('check.login') }}" class="border rounded"
                        style="padding: 40px 40px 20px 40px;">

                        @csrf
                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="text-black" for="fname">Email</label>

                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-group mb-4">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="text-black" for="fname">Password</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="submit" name="submit" value="Log In" class="btn px-4 btn-primary text-white">
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
