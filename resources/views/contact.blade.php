@extends('layouts.front')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold">Contact Info & Location</h1>
        <p class="lead">Get in touch or find us on the map.</p>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title">Contact Details</h5>
                    <p class="mb-1"><strong>Email:</strong> info@yourschool.edu</p>
                    <p class="mb-1"><strong>Phone:</strong> +123 456 7890</p>
                    <p class="mb-1"><strong>Address:</strong> 123 School Lane, City, Country</p>
                </div>
            </div>
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Send Us a Message</h5>
                    <form>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Your Name">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="Your Email">
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" rows="3" placeholder="Your Message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection