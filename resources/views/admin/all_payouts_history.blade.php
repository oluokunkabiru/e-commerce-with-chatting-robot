@extends('admin.layout')
@section('title', 'Pending Payout')
@section('content')

<div class="card-body">
    <h2 class="text-center font-weight-bold">All Orders Waiting</h2>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong style="font-size:15px;">Success :{{session('success') }}</strong><br />
    </div>
    @endif


    @if($errors->any())

    <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong style="font-size:20px;">Oops!
            {{ "Kindly rectify below errors" }}</strong><br />
        @foreach ($errors->all() as $error)
        {{$error }} <br />
        @endforeach
    </div>
    @endif

    <table id="recent" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Prouct</th>
                <th>Order Quantity</th>
                <th>Marketer Name</th>
                <th>Marketer Phone</th>
                <th>Amount</th>

                <th>Payment Action</th>
            </tr>
        </thead>
        <tbody>
            @php
            $i =0;
            @endphp
            @if($orders)
            {{-- @foreach ($products as $product ) --}}
            @foreach ($orders as $order)
            @if ($order->picture!=NULL && $order->product !=NULL)

            @php
            $picture= $order->picture->file ? $order->picture->file :"";
            @endphp
            <tr>
                <td scope="row">{{ ++$i }}</td>

                {{--  @php
     $categorys = $product->category ? $product->category->category:"";
      @endphp  --}}
                <td> <img src="{{url($picture)}}" alt="{{$picture }}" style="width:100px"> </td>
                <td>{{ $order->product_name }}</td>
                <td>{{ $order->quantity}}</td>
                <td>{{ $order->productOwner($order->product->user_id)->name }}</td>

                <td>{{ $order->productOwner($order->product->user_id)->phone }}</td>
                <td><span class="fa">&#8358;</span>{{ number_format($order->billing_total_price,2,".",",") }}</td>
                <td>@if ($order->payoutstatus=="pending")
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                           Pending
                        </button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="{{ route('payout-now', [$order->id, 'paid']) }}">Approved Payout</a>
                        </div>
                      </div>
                    @elseif($order->payoutstatus=="paid")
                    <span class="btn btn-success">{{ $order->payoutstatus }}</span>

                    @else
                    <span class="btn btn-warning">{{ $order->payoutstatus }}</span>

                    @endif</td>

                {{-- {{route('products.show', $product->id)}} --}}
            </tr>


            @endif

            {{-- @endforeach --}}
            @endforeach
            @endif
        </tbody>

    </table>
</div>

<div class="modal" id="view"> </div>

{{-- end view product --}}
{{-- edit product --}}
<div class="modal" id="deliver"></div>
{{-- /end view --}}
{{-- /end view --}}

@endsection

@section('script')
<script>
    //   tabile
       $(function () {
      $('#recent').DataTable();
  });

  //   tabile
  $(function () {
      $('#allOrder').DataTable();
  });

  $(document).ready(function(){
    $('#view').on('show.bs.modal', function(e){
      var id = $(e.relatedTarget).attr('dataid');
    //   alert(id);
      $.ajax({
        type:'post',
        headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
        url:'{{route('viewAllOrderStatus')}}',
        data:'view='+id,
        success:function(data){
          $('#view').html(data);
        }
      })
    })
  })


//   edit product javascript





</script>
@endsection
