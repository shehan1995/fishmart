<nav class="navbar navbar-expand navbar-dark bg-primary">
    <div class="navbar-nav w-100">
        <a class="navbar-brand text-color" href="/">Fish Mart</a>
        <a class="nav-item nav-link" href="/hotels">Browse Advertisements</a>
        <div class="ml-auto">
            @if (Auth::check())
                <a class="nav-item nav-link" href="{{ url('logout') }}">Logout</a>
            @else
                <a class="nav-item nav-link" href="{{ url('login') }}">Login/Signup</a>
            @endif
        </div>
    </div>
</nav>
