<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container my-3 mt-5">
        <div class="row">
            <div class="col-3 ">
                <nav class="">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a class=" text-decoration-none" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="list-group-item">
                            <a class=" text-decoration-none" href="{{ route('profile') }}">Profile</a>
                        </li>
                        <li class="list-group-item">
                            <a class="text-decoration-none" href="{{ route('categories.index') }}">Categories</a>
                        </li>
                        <li class="list-group-item">
                            <a class="text-decoration-none" href="{{ route('lists.index') }}">Lists</a>
                        </li>
                        <li class="list-group-item">
                            <a class="text-decoration-none" href="{{ route('posts.index') }}">Posts</a>
                        </li>
                        <li class="list-group-item">
                            <a class="text-decoration-none" href="{{ route('trendPosts.index') }}">Trend Posts</a>
                        </li>
                        <li class="list-group-item">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="btn btn-sm btn-primary " type="submit">Logout</button>
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col">
                <main>
                    @yield('content')
                </main>
            </div>
        </div>


    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

</html>
