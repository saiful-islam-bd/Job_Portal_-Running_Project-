<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
{{-- font awesome cdn --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar header-top fixed-top navbar-expand-lg  navbar-dark" style="background-color:#1e2327;">
            <div class="container" style="max-width: 1226px; padding-left: 0px;padding-right: 0px;">
                <a class="navbar-brand" href="{{ route('admin.dashboard') }}"><img src="{{ asset('assets/admin/logo/1712655904010.png') }}"
                        alt="" style="width: 21px;"> Admin</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarText">

                    @auth('admin')
                        <ul class="navbar-nav side-nav" style="background:#071427;">
                            <li class="nav-item">
                                <a class="nav-link text-white" style="margin-left: 20px;" href="
                                {{ route('admin.dashboard') }}"><i class="fa-solid fa-house" style="margin-right: 8px;"></i> Home
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('view.admins') }}" style="margin-left: 20px;"><i class="fa-solid fa-user-tie" style="margin-right: 8px;"></i> Admins</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('display.categories')}}"
                                    style="margin-left: 20px;"><i class="fa-solid fa-list" style="margin-right: 8px;"></i> Categories</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('display.jobs') }}" style="margin-left: 20px;"><i class="fa-solid fa-briefcase" style="margin-right: 8px;"></i> Jobs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('display.applications') }}"
                                    style="margin-left: 20px;"><i class="fa-solid fa-clipboard-check" style="margin-right: 8px;"></i> Applications</a>
                            </li>
                        </ul>
                    @endauth


                    <ul class="navbar-nav ml-md-auto d-md-flex">
                        @auth('admin')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-house" style="margin-right: 8px; font-size: 20px;"></i>
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa-regular fa-user" style="margin-right: 8px;"></i> 
                                    {{ Auth::guard('admin')->user()->email }}
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">Logout</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('view.login') }}">Login
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                        @endauth


                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">

            <main class="py-4">
                @yield('content')
            </main>

        </div>


        <script type="text/javascript"></script>
</body>

</html>
