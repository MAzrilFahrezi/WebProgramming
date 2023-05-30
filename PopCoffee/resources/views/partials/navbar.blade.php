<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#028446 !important;">
    <div class="container-fluid">
        <a class="navbar-brand" href="/home">
            <!-- <img src="img/popoplogo.png" class="d-inline-block align-text-top"> -->
            PopCoffee
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav text-light">
                <li class="nav-item">
                    <a class="nav-link" href="/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/variant">Variant</a>
                </li>
                @can('view_coffee', \App\Models\coffee::class)
                <li class="nav-item">
                    <a class="nav-link" href=" /coffee">Coffee</a>
                </li>
                @endcan
                @can('view_customer', \App\Models\customer::class)
                <li class="nav-item">
                    <a class="nav-link" href=" /customer">Customer</a>
                </li>
                @endcan
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=" /about">About</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Hi, {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-in-left"></i>Logout</a></button>
                            </form>
                    </ul>
                </li>
                @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Login</a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/login">Login</a></li>
                        <li><a class="dropdown-item" href="/register">Register</a></li>
                    </ul>
                </li>
                @endauth
            </ul>
        </div>
    </div>
    </div>
</nav>