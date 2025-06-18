<!DOCTYPE html>
<html>
<head>
    <title>School Portal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body style="background: linear-gradient(135deg, #4f8ef7 0%, #e0e7ff 80%); min-height: 100vh;">
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}"> School Website</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('programs') }}">Programs</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('calendar') }}">Calendar</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
                    <li class="nav-item"><a class="nav-link btn btn-success text-white px-3 ms-2" href="{{ route('login') }}">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
</body>
</html>