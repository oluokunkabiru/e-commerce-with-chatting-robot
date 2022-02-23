@extends('layout.mainlayout')
@section('title', 'Flutterwave Payment')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-white">
                    <h3 class="text-center font-weight-bold">{{ __(' Flutterwave Payment') }}</h3>

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
                                        <th>Payment Status</th>
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
                                            @if ($item->payoutstatus=="pending")
                                            
                                                <span class="btn btn-danger">Pending</span>
                                            @elseif ($item->payoutstatus=="paid")
                                            <span class="btn btn-success">Paid </span>
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
                        {{--  <div class="col-md-6">  --}}
                            <form method="POST" action="{{ route('product-flutterwave') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                                <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                                <input type="hidden" name="phone" value="{{ Auth::user()->phone }}">
                                <input type="hidden" name="amount" value="{{ $total_amount }}">
                                <input type="hidden" name="currency" value="NGN">
                                {{--  <input type="hidden" name="ref" value="{{ $id }}" />  --}}
                                <input type="hidden" name="logo" value="http://farmersuccess.koadit.com/asset/images/1644194458_fc1.png" />
                                <input type="hidden" name="reference" value="{{ $id }}">
                                <button type="submit" class="btn btn-warning btn-rounded btn-block">Continue Payment With Flutterwave</button>
                            </form>
                        {{--  </div>  --}}





                    </div>


                </div>



            </div>
        </div>
    </div>
</div>
@endsection
