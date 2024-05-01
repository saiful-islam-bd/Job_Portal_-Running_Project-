@extends('layouts.app_admin')
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col">
              
                {{-- save job successful alert --}}
                <div class="container text-center" style="margin-top: 40px;">
                    @if (\Session::has('create'))
                        <div class="alert alert-success">
                            <p style="font-size: 18px; font-weight:600; color: #08bc0b; margin-top:10px;">
                                {!! \Session::get('create') !!}</p>
                        </div>
                    @endif
                </div>

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
                        <h5 class="card-title mb-4 d-inline">Admins</h5>
                        <a href="{{ route('create.admins') }}" class="btn btn-primary mb-4 text-center float-right">Create
                            Admins</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($allAdmins as $admin)
                                    <tr>
                                        <th scope="row">{{ $admin->id }}</th>
                                        <td>{{ $admin->name }}</td>
                                        <td>{{ $admin->email }}</td>
                                        <td><a href="{{ route('delete.admins', $admin->id ) }}" class="btn btn-danger  text-center ">Delete </a></td>
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
