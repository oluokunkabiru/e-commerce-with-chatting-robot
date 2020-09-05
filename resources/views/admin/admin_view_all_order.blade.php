@extends('modals.modallayout')
@section('title', ucwords( $view->product_name) )

@section('content')
<div class="row">
    <div class="col-md-5">
        <div class="card">
            <img src="../../{{$view->picture->file }}" alt="{{ $view->product_name }}" class="card-img">
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
                @if ($view->delivered_by!="")
                <h5>Delivered By:: {{ $view->delivered_by }}</h5>
                @endif

            </div>
        </div>
    </div>

</div>

<h3 class="text-center">Marketer in Charge Of This product</h3>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-dark"><h4 class="text-center">{{ $marketer->user->name }}</h4></div>
            <div class="card-body">
                <div>
                 <div class="text-center">
                    <img src="../../{{ $marketer->user->picture->file }}" alt="{{ $marketer->user->name }}" style="width: 100px" class="card-img rounded-circle">
                 </div>
                 <a href="#moremarketerinfo" data-toggle="collapse" class="card-link">More</a>
                 <div class="container bg-dark collapse" id="moremarketerinfo">
                 <div class="row">
                     <div class="col">
                         <p>Phone Number : </p>
                     </div>
                     <div class="col">
                        <p>{{ $marketer->user->phone?$marketer->user->phone:"Not Available" }} </p>
                    </div>
                 </div>
                 <div class="row">
                    <div class="col">
                        <p>Email : </p>
                    </div>
                    <div class="col">
                       <p>{{ $marketer->user->email?$marketer->user->email:"Not Available" }} </p>
                   </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p>Contact Address : </p>
                    </div>
                    <div class="col">
                       <p>{{ $marketer->user->address?$marketer->user->address:"Not Available" }} </p>
                   </div>
                </div>

                <div class="row">
                    <div class="col">
                        <p>City : </p>
                    </div>
                    <div class="col">
                       <p>{{ $marketer->user->city?$marketer->user->city:"Not Available" }} </p>
                   </div>
                </div>

                <div class="row">
                    <div class="col">
                        <p>State : </p>
                    </div>
                    <div class="col">
                       <p>{{ $marketer->user->state?$marketer->user->state:"Not Available" }} </p>
                   </div>
                </div>

                <div class="row">
                    <div class="col">
                        <p>Country : </p>
                    </div>
                    <div class="col">
                       <p>{{ $marketer->user->country?$marketer->user->country:"Not Available" }} </p>
                   </div>
                </div>

                </div>
</div>
            </div>
        </div>
    </div>
    <div class="col-md-2"></div>
</div>
@section('footer')
<div class="modal-footer">
    <button class="btn btn-danger btn-lg float-right mr-3" data-dismiss="modal">Close</button>
</div>
@endsection

@endsection
