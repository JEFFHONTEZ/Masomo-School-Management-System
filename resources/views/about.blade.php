@extends('layouts.front')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold">About Our School</h1>
        <p class="lead">Discover our mission, vision, and values.</p>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Our Mission</h5>
                    <p class="card-text">To empower students with knowledge, skills, and values for a brighter future.</p>
                    <h5 class="card-title mt-4">Our Vision</h5>
                    <p class="card-text">To be a leading institution recognized for academic excellence and holistic development.</p>
                    <h5 class="card-title mt-4">Our Values</h5>
                    <ul>
                        <li>Integrity</li>
                        <li>Respect</li>
                        <li>Innovation</li>
                        <li>Community</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection