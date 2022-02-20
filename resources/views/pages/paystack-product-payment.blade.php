@extends('layout.mainlayout')
@section('title', 'Paystack Product payment')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-white">
                    <h3 class="text-center font-weight-bold">{{ __('Continue payment with paystack') }}</h3>
                    <h2><span class="fa">&#8358;
                    {{--  </span>{{ number_format(2000, 2, '.', ',') }}</th>  --}}
         </h2>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10">
                            <table class="table table-hover table-responsive table-borderless">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                        <th>Deliver Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total_amount=0;
                                    @endphp
                                    @foreach ($payment as $item)
                                    <tr>
                                        <td><img src="{{ url($item->picture?$item->picture->file:"") }}" alt="{{ $item->product_name }}" style="width: 100px"></td>
                                        <td>{{ $item->product_name }}</td>
                                        <td><span class="fa">&#8358;</span> {{ $item->billing_price}}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td><span class="fa">&#8358;</span> {{ $item->billing_total_price }}</td>
                                        <td>
                                            @if ($item->status=="Pending")
                                                <span class="btn btn-danger">Pending</span>
                                            @elseif ($item->status=="Processing")
                                                <span class="btn btn-info">Processing <span class="spinner-grow text-white"></span></span>
                                            @else
                                                <span class="btn btn-success">Delivered</span>
                                            @endif
                                        </td>
                                        @php
                                            $total_amount+=$item->billing_total_price;
                                        @endphp
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                                <h2 class="m-4 font-weight-bold">Total Amount : <span class="fa">&#8358;</span> {{ number_format($total_amount,2,".",",") }} </h2>

                        </div>
                        {{--  <div class="">  --}}

                            <form method="POST" action="{{ route('product-paystack') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                                {{ csrf_field() }}

                                <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                                <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                                <input type="hidden" name="phone" value="{{ Auth::user()->phone }}">
                                <input type="hidden" name="amount" value="{{ $total_amount *100 }}">
                                <input type="hidden" name="currency" value="NGN">
                                <input type="hidden" name="reference" value="{{ str_replace(" ","_", env('APP_NAME').'_'. $id ) }}">
                                <button type="submit" class="btn btn-info btn-rounded btn-block">Pay With Paystack</button>
                            </form>
                        {{--  </div>  --}}

                    </div>


                </div>



            </div>
        </div>
    </div>
</div>
@endsection
