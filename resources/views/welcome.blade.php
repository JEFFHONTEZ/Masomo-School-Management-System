{{-- filepath: resources/views/welcome.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Our School</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#0d6efd">
    <script>
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/serviceworker.js');
    }
    </script>
    <style>
        body {
            background: linear-gradient(135deg, #f8fafc 0%, #e0e7ff 100%);
            min-height: 100vh;
        }
        .hero {
            background: #4f8ef7;
            color: #fff;
            border-radius: 1rem;
            padding: 3rem 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 24px rgba(79,142,247,0.08);
        }
        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 2px 12px rgba(0,0,0,0.06);
            transition: transform 0.1s;
        }
        .card:hover {
            transform: translateY(-4px) scale(1.02);
            box-shadow: 0 6px 24px rgba(79,142,247,0.12);
        }
        .btn {
            border-radius: 2rem;
        }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="hero text-center mb-5">
        <h1 class="display-4 mb-3">🏫 Welcome to Our School</h1>
        <p class="lead mb-4">Empowering students for a brighter future. Explore our programs, apply online, and discover what makes our school special!</p>
        <a href="{{ route('admission') }}" class="btn btn-lg btn-warning px-4">Apply Now</a>
    </div>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card h-100 text-center">
                <div class="card-body">
                    <h5 class="card-title">About the School</h5>
                    <p class="card-text">Learn about our mission, vision, and values.</p>
                    <a href="{{ route('about') }}" class="btn btn-outline-primary">Learn More</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 text-center">
                <div class="card-body">
                    <h5 class="card-title">Programs & Curriculum</h5>
                    <p class="card-text">Explore our academic offerings and curriculum details.</p>
                    <a href="{{ route('programs') }}" class="btn btn-outline-primary">View Programs</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 text-center">
                <div class="card-body">
                    <h5 class="card-title">Academic Calendar</h5>
                    <p class="card-text">Stay updated with important dates and events.</p>
                    <a href="{{ route('calendar') }}" class="btn btn-outline-primary">View Calendar</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 text-center">
                <div class="card-body">
                    <h5 class="card-title">Contact Info & Location</h5>
                    <p class="card-text">Get in touch or find us on the map.</p>
                    <a href="{{ route('contact') }}" class="btn btn-outline-primary">Contact Us</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 offset-md-4">
            <div class="card h-100 text-center">
                <div class="card-body">
                    <h5 class="card-title">Login</h5>
                    <p class="card-text">Access your account or portal.</p>
                    <a href="{{ route('login') }}" class="btn btn-success">🔗 Login</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>