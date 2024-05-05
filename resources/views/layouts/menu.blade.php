<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>

<li class="nav-item dropdown">
    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="nav-icon fas fa-user"></i>
        <p>Users</p>
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <a href="{{route('admin.users.create')}}" class="dropdown-item">Add User</a>
        <a href="{{route('admin.users.index')}}" class="dropdown-item">View Users</a>
        <a href="#" class="dropdown-item">Manage Permissions</a>
    </div>
</li>
<li class="nav-item dropdown">
    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="nav-icon fas fa-tv"></i>
        <p>Shows</p>
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <a href="{{route('admin.series.index')}}" class="dropdown-item">View Shows</a>
        <a href="{{route('shows.create')}}" class="dropdown-item">Add Show</a>
       
    </div>
</li>

<li class="nav-item dropdown">
    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="nav-icon fas fa-tv"></i>
        <p>Episodes</p>
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <a href="#" class="dropdown-item">View Episode</a>
        <a href="{{route('episodes.create')}}" class="dropdown-item">Add Episode</a>
        <a href="#" class="dropdown-item">Edit Episode</a>
    </div>
</li>

<li class="nav-item dropdown">
    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="nav-icon fas fa-tv"></i>
        <p>Catigories</p>
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
     
        <a href="{{route('admin.categories.index')}}" class="dropdown-item">View All Catigories</a>
        <a href="{{route('categories.create')}}" class="dropdown-item">Add Catigories</a>
    </div>
</li>