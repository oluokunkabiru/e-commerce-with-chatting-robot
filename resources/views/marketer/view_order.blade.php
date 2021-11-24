@extends('modals.modallayout')
@section('title', ucwords( $view->product_name) )

@section('content')
<div class="row">
    <div class="col-md-5">
        <div class="card">
            <img src="{{url($view->picture->file) }}" alt="{{ $view->product_name }}" class="card-img">
        </div>
    </div>

    <div class="col-lg-7 col-md-7">
        <!-- small box -->
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3> {{ucwords( $view->product_name) }} </h3>
                        <p>Product Name</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3> {{ $view->quantity }} </h3>
                        <p>Quantity</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3> {{ $view->billing_price }} </h3>
                        <p>Price</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3> {{ $view->billing_total_price }} </h3>
                        <p>Total Price</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<h3 class="text-center">Customers Details</h3>

<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6">
        <!-- small box -->
        <div class="small-box bg-dark">
            <div class="inner">
                <h5> Country :: {{ucwords($view->billing_country) }} </h5>
                <h5> State :: {{ ucwords($view->billing_state) }} </h5>
                <h5> City ::{{ ucwords($view->billing_city) }} </h5>
                <h5> Address ::{{ ucwords($view->billing_address) }} </h5>
                <h5> Zipcode ::{{ $view->billing_zipcode }} </h5>

            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6">
        <!-- small box -->
        <div class="small-box bg-dark">
            <div class="inner">
                <h5> Phone No :: {{ $view->billing_phone }} </h5>
                <h5> Email :: {{ $view->billing_email }} </h5>
                <h5> Payment Method :: {{ucwords( $view->billing_payment_method) }} </h5>
                <h5>Order Date:: {{ $view->created_at }}</h5>
                @if ($view->created_at!=$view->updated_at)
                <h5>Deliver Date :: {{ $view->updated_at }}</h5>
                @endif

            </div>
        </div>
    </div>

</div>
@section('footer')
<div class="modal-footer">
    <button class="btn btn-danger btn-lg float-right mr-3" data-dismiss="modal">Close</button>
</div>
@endsection

@endsection
