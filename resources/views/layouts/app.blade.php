<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOW.TV</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">SHOW.TV</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link text-white" href="{{route('shows.index')}}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Search for Episodes / TV Shows</a>
            </li>
            <li class="dropdown">
    <a href="#" class="nav-item dropdown-toggle nav-link text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catigories</a>
    <div class="dropdown-menu">
        @foreach($categories as $category)
        <a class="dropdown-item" href="{{ route('category.show', ['id' => $category->id]) }}">{{ $category->name }}</a>
        @endforeach
    </div>
</li>

            <li class="nav-item">
                <a class="nav-link text-white" href="{{route('shows.index')}}">View Series / TV Shows</a>
            </li>
            @guest <!-- إذا كان المستخدم لم يقم بتسجيل الدخول -->
    <li class="nav-item">
        <a class="nav-link text-white" href="{{ route('login') }}">Login</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-white" href="{{ route('register') }}">Register</a>
    </li>
@endguest

@auth <!-- إذا كان المستخدم قام بتسجيل الدخول -->
    <!-- هنا يمكنك وضع أي شيء آخر تريده عند تسجيل الدخول -->
@endauth

        </ul>
      
        <ul class="navbar-nav">
    <li class="nav-item">
        @guest
            <a class="nav-link text-white" href="{{ route('login') }}">Login</a>
        @else
            <div class="dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('profile', ['id' => Auth::id()]) }}">Profile</a>
                    <!-- Add more dropdown items if needed -->
                    <div class="dropdown-divider"></div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                </div>
            </div>
        @endguest
    </li>
</ul>

</nav>



    @yield('content')

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
