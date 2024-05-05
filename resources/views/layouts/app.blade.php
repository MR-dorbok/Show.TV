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
            <a class="nav-link text-white" href="#" data-toggle="modal" data-target="#searchModal">Search for Episodes / TV Shows</a>
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


<script>
    $(document).ready(function () {
        $('#searchForm').submit(function (event) {
            event.preventDefault(); // يمنع إعادة تحميل الصفحة عند تقديم النموذج

            var query = $('#searchInput').val(); // الاستعلام المدخل

            $.ajax({
                url: '/search', // المسار لمعالجة البحث
                method: 'GET',
                data: { query: query }, // بيانات الاستعلام
                success: function (response) {
                    $('#searchResults').html(response); // عرض البيانات في المودال
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
</script>

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
<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="searchModalLabel">Search for Episodes / TV Shows</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{ route('search.results') }}" method="GET">
    <div class="form-group">
        <input type="text" class="form-control" name="query" placeholder="Enter search query">
    </div>
    <button type="submit" class="btn btn-primary">Search</button>
</form>


                <div id="searchResults"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


