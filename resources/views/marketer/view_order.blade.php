@extends('modals.modallayout')
@section('title',  $view->product_name )

@section('content')
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <img src="{{ $view->picture->file }}" alt="{{ $view->product_name }}" class="card-img">
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <!-- small box -->
            <div class="small-box bg-info">
            <div class="inner">
                <h3> {{ $view->product_name }} </h3>
                <p>Product Name</p>
            </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3">
            <div class="small-box bg-info">
            <div class="inner">
                <h3>  {{ $view->quantity }}</h3>
                <p>Order Quantity</p>
            </div>
            </div>
        </div>

    </div>


    <div class="row">
        <h3>Customers Address Details</h3>
        <div class="col-lg-3 col-md-3">
            <!-- small box -->
            <div class="small-box bg-warning">
            <div class="inner">
                <h3 > {{ $view->billing_country }} </h3>
                <p>Country</p>
            </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3">
            <!-- small box -->
            <div class="small-box bg-success">
            <div class="inner">
                <h3 >{{ $view->newprice }}</h3>
                <p>Product New Price</p>
            </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <!-- small box -->
            <div class="small-box bg-secondary">
            <div class="inner">
                <h3 >{{ $view->quantity }} </h3>
                <p>Available Quantity</p>
            </div>
            </div>
        </div>
    </div>

@endsection
