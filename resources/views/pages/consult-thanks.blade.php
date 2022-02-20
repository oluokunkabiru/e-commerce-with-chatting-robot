@extends('layout.mainlayout')
@section('title', 'Thanks for your patronage')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 jumbotron">
                <h4><i><strong>Dear {{ ucwords($name) }}</strong></i>,</h4>
                <h5 class="m-4">Your consultant request have received successfully, we will get back to you </h5>
                <p><a href="{{ route('home') }}" class="btn btn-success">Go to Home</a></p>
            </div>
            <div class="col-md-3"></div>
        </div>

    </div>
@endsection
