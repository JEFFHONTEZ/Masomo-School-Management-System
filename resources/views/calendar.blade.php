@extends('layouts.front')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold">Academic Calendar</h1>
        <p class="lead">Stay updated with important dates and events.</p>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>First Term:</strong> Sept 1 - Dec 15</li>
                        <li class="list-group-item"><strong>Second Term:</strong> Jan 10 - Mar 30</li>
                        <li class="list-group-item"><strong>Third Term:</strong> Apr 15 - Jun 20</li>
                        <li class="list-group-item"><strong>School Events:</strong> Sports Day, Science Fair, Graduation</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection