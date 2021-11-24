@extends('modals.modallayout')

@section('title',  $view->product_name )

@section('content')
<div class="row">
    <div class="col-md-4 col-lg-4">
        <img src="{{url( $view->picture->file) }} " id="image" width="200px" class="img-fluid">
    </div>
<!----- //Picture -->
<div class="col-lg-4 col-md-4">
    <!-- small box -->
    <div class="small-box bg-info">
    <div class="inner">
        <h3> {{ $view->product_name }} </h3>
        <p>Product Name</p>
    </div>
    </div>
</div>
<div class="col-lg-4 col-md-4">
    <div class="small-box bg-info">
    <div class="inner">
        <h3>  {{ $view->category->category }}</h3>
        <p>Product Category</p>
    </div>
    </div>
</div>
</div>
<div class="row">
    <div class="col-lg-4 col-md-4">
        <!-- small box -->
        <div class="small-box bg-warning">
        <div class="inner">
            <h3 ><span class="fa">&#8358;</span> {{ $view->oldprice }} </h3>
            <p>Product Last Price</p>
        </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4">
        <!-- small box -->
        <div class="small-box bg-success">
        <div class="inner">
            <h3 ><span class="fa">&#8358;</span>{{ $view->newprice }}</h3>
            <p>Product Normal Price</p>
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

<div class="row">
    <div class="col-lg-5 col-md-5">
        <!-- small box -->
        <div class="small-box bg-secondary">
        <div class="inner">
            <h4 >Marketer Location</h4>
            <p>{{ $view->location  }}</p>
        </div>
        </div>
    </div>
    <div class="col-lg-7 col-md-7">
        <!-- small box -->
        <div class="small-box bg-secondary">
        <div class="inner">
            <h3 >Description</h3>
            <p>{{ $view->description }}</p>
        </div>
        </div>
    </div>
</div>
@endsection

