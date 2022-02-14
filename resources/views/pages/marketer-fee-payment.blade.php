@extends('layout.mainlayout')
@section('title', 'Marketer Fees')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-white">
                    <h3 class="text-center font-weight-bold">{{ __('Marketer Fee') }}</h3>
                    <h2><span class="fa">&#8358;
                    </span>{{ number_format(2000, 2, '.', ',') }}</th>
         </h2>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form method="POST" action="{{ route('flutterwave-marketer-fee') }}">
                                {{ csrf_field() }}

                                <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                                <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                                <input type="hidden" name="phone" value="{{ Auth::user()->phone }}">
                                <input type="hidden" name="amount" value="2000">
                                {{-- <input type="hidden" name="currency" value="NGN"> --}}
                                <button type="submit" class="btn btn-warning btn-rounded btn-block">Pay With Flutterwave</button>
                            </form>
                        </div>



                        <div class="col-md-6">
                            <form method="POST" action="{{ route('paystack-marketer-fee') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                                {{ csrf_field() }}

                                <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                                <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                                <input type="hidden" name="phone" value="{{ Auth::user()->phone }}">
                                <input type="hidden" name="amount" value="{{ 2000*100 }}">
                                <input type="hidden" name="currency" value="NGN">
                                <input type="hidden" name="reference" value="{{ str_replace(" ","_", env('APP_NAME').'_'. time() ) }}">
                                <button type="submit" class="btn btn-info btn-rounded btn-block">Pay With Paystack</button>
                            </form>
                        </div>

                    </div>


                </div>



            </div>
        </div>
    </div>
</div>
@endsection
