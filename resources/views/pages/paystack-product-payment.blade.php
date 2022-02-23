@extends('layout.mainlayout')
@section('title', 'Paystack Product payment')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-white">
                    <h3 class="text-center font-weight-bold">{{ __('Continue payment with paystack') }}</h3>

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
                        {{--  <div class="">  --}}

                            <form method="POST" action="{{ route('productpaywithpaystack') }}" id="paystackPaymentForm" accept-charset="UTF-8" class="form-horizontal" role="form">
                                {{ csrf_field() }}

                                <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                                <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                                <input type="hidden" name="phone" value="{{ Auth::user()->phone }}">
                                <input type="hidden" name="amount" value="{{ $total_amount *100 }}">
                                <input type="hidden" name="currency" value="NGN">
                                <input type="hidden" id="reference" name="reference">
                                <button type="button" onclick="payWithPaystack()" class="btn btn-info btn-rounded btn-block">Pay With Paystack</button>
                            </form>
                        {{--  </div>  --}}

                    </div>


                </div>



            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>

    function payWithPaystack() {
		var handler = PaystackPop.setup({
			key: '{{ env('PAYSTACK_PUBLIC_KEY') }}',
			email: "{{ Auth::user()->email }}",
			amount: parseInt("{{ $total_amount *100 }}"),
			currency: "NGN",
			ref: "{{ $id }}",
			firstname: "{{ Auth::user()->name }}",
			lastname: "{{ Auth::user()->name }}",
			// label: "Optional string that replaces customer email"
			metadata: {
				custom_fields: [
					{
						display_name: "Mobile Number",
						variable_name: "mobile_number",
						value: "{{ Auth::user()->phone }}"
					}
				]
			},
			callback: function (response) {
                // console.log(response);
                if(response.status=="success"){
                    $('#reference').val(response.reference);
                    if ($('#reference').val() != '') {
                        $("#paystackPaymentForm").submit();
                    }
                }

			},
			onClose: function () {
				//alert('window closed');
			}
		});
		handler.openIframe();
	}

</script>

@endsection

