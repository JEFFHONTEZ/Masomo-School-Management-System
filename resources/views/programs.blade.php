@extends('layouts.front')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold">Programs & Curriculum</h1>
        <p class="lead">Explore our diverse academic offerings.</p>
    </div>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Primary Education</h5>
                    <p class="card-text">A strong foundation in literacy, numeracy, and social skills.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Secondary Education</h5>
                    <p class="card-text">Comprehensive curriculum preparing students for higher education and careers.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Extracurricular Activities</h5>
                    <p class="card-text">Sports, arts, clubs, and leadership opportunities for holistic growth.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection