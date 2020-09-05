@extends('modals.modallayout')
@section('title', ucwords( $view->product_name) )

@section('content')
<div class="row">
    <div class="col-md-5">
        <div class="card">
            <img src="../../{{ $view->picture->file }}" alt="{{ $view->product_name }}" class="card-img">
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
                <h4> Phone No :: {{ $view->billing_phone }} </h4>
                <h4> Email :: {{ $view->billing_email }} </h4>
                <h4> Payment Method :: {{ucwords( $view->billing_payment_method) }} </h4>
                <h4>Order Date:: {{ $view->created_at }}</h4>
                @if ($view->created_at!=$view->updated_at)
                <h4>Deliver Date :: {{ $view->updated_at }}</h4>
                @endif
            </div>
        </div>
    </div>

</div>

@section('footer')
<div class="modal-footer">
    <form action="{{ route('adminDelivered') }}" method="POST">
        {{ csrf_field() }}
        @method('put')
        <input type="hidden"  name="id" value="{{ $view->id }}">
    <button type="submit" class="btn btn-success btn-lg ml-3">Deliver </button>
    <button class="btn btn-warning btn-lg float-right mr-3" data-dismiss="modal">Cancel</button>
</div>
</form>
@endsection

@endsection
