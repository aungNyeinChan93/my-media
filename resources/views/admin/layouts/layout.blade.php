<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Media App</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('AdminTemplate/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminTemplate/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navb
        ar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="{{ route('dashboard') }}" class="brand-link">
                <span class="brand-text font-weight-light">My Media App</span>
            </a>

            {{-- sidebar --}}
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link">
                                <i class="fas fa-chart-line"></i>
                                <p>
                                    Dsahboard
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('profile.view') }}" class="nav-link">
                                <i class="fas fa-user-circle"></i>
                                <p>
                                    My Profile
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('categories.index') }}" class="nav-link">
                                <i class="fas fa-list"></i>
                                <p>
                                    Category
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('lists.index') }}" class="nav-link">
                                <i class="fas fa-list ms-5"></i>
                                <p>
                                    Lists
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('adminList.list') }}" class="nav-link">
                                <i class="fas fa-users"></i>
                                <p>
                                    Admin Lists
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('posts.index') }}" class="nav-link">
                                <i class="fas fa-book"></i>
                                <p>
                                    Posts
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('trendPosts.index') }}" class="nav-link">
                                <i class="fas fa-biking"></i>
                                <p>
                                    Trends Posts
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="mx-3 d-flex" href="" class="nav-link">
                                <div class="mr-2">
                                    <i class="fas fa-sign-out-alt"></i>
                                </div>
                                <div class="">
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <input class="btn btn-sm bg-dark" type="submit" value="Logout">
                                    </form>
                                </div>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="row mt-4">
                        @yield('content')
                    </div>
                </div>
            </section>
        </div>

        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>
    <script src="{{ asset('AdminTemplate/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('AdminTemplate/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('AdminTemplate/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('AdminTemplate/dist/js/demo.js') }}"></script>
</body>

</html>
