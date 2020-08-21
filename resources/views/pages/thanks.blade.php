@extends('layout.mainlayout')
@section('title', 'Thanks for your patronage')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 jumbotron">
                <h4><i><strong>Dear {{ Auth::user()->name }}</strong></i>, your orders have been taken successfully</h4>
                <h5 class="m-4">Thanks for your patronage, we promised to get back to you shortly</h5>
                <p><a href="{{ route('shop') }}">Shopping more</a></p>
            </div>
            <div class="col-md-3"></div>
        </div>

    </div>
@endsection
