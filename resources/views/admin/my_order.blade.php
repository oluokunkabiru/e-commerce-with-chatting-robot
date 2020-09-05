@extends('admin.layout')
@section('title', 'Admin Orders')
@section('content')

<div class="card-body">
    <h2 class="text-center font-weight-bold">Recent Orders</h2>

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
                <th>Name</th>
                <th>Order Quantity</th>
                <th>Customer Name</th>
                <th>Customer Location</th>
                <th>Customer Phone</th>
                <th>Order Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
            $i =0;
            @endphp
            @if($products)
            @foreach ($products as $product )
            @foreach ($product->orders as $order)
            @if ($order->status=="Pending")


            <tr>
                <td scope="row">{{ ++$i }}</td>
                @php
                $picture= $order->product->picture->file ? $order->product->picture->file :"";
                @endphp
                {{--  @php
     $categorys = $product->category ? $product->category->category:"";
      @endphp  --}}
                <td> <img src="../../{{$picture}}" alt="{{$picture }}" style="width:100px"> </td>
                <td>{{ $order->product_name }}</td>
                <td>{{ $order->quantity}}</td>
                <td>{{ $order->user->name }}</td>
                <td>{{ $order->billing_city }}</td>
                <td>{{ $order->billing_phone }}</td>
                <td>@if ($order->status=="Pending")
                    <span class="btn btn-danger">{{ $order->status }}</span>
                    @elseif($order->status=="Processing")
                    <span class="btn btn-warning">{{ $order->status }}</span>
                    @else
                    <span class="btn btn-success">{{ $order->status }}</span>

                    @endif</td>
                <td>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="#view" dataid="{{$order->id}}" data-toggle="modal"
                                class="btn btn-primary btn-sm"><i class="far fa-eye" style="font-size: 12px;"></i> </a>

                        </div>
                        <div class="col-md-6">
                            <a href="#deliver" dataid="{{$order->id}}" data-toggle="modal"
                                class="btn btn-success btn-sm"><i class="fas fa-shopping-cart"
                                    style="font-size: 12px;"></i> </a>

                        </div>
                    </div>

                </td>
                {{-- {{route('products.show', $product->id)}} --}}
            </tr>


            @endif

            @endforeach
            @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Order Quantity</th>
                <th>Customer Name</th>
                <th>Customer Location</th>
                <th>Customer Phone</th>
                <th>Orders Status</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
</div>


<div class="card-body mt-4">
    <h2 class="text-center font-weight-bold">All Orders</h2>

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

    <table id="allOrder" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Order Quantity</th>
                <th>Customer Name</th>
                <th>Customer Location</th>
                <th>Customer Phone</th>
                <th>Order Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
            $i =0;
            @endphp
            @if($products)
            @foreach ($products as $product )
            @foreach ($product->orders as $order)
            @if ($order->status!="Pending")


            <tr>
                <td scope="row">{{ ++$i }}</td>
                @php
                $picture= $order->product->picture->file ? $order->product->picture->file :"";
                @endphp
                {{--  @php
     $categorys = $product->category ? $product->category->category:"";
      @endphp  --}}
                <td> <img src="../../{{$picture}}" alt="{{$picture }}" style="width:100px"> </td>
                <td>{{ $order->product_name }}</td>
                <td>{{ $order->quantity}}</td>
                <td>{{ $order->user->name }}</td>
                <td>{{ $order->billing_city }}</td>
                <td>{{ $order->billing_phone }}</td>
                <td>@if ($order->status=="Pending")
                    <span class="btn btn-danger">{{ $order->status }}</span>
                    @elseif($order->status=="Processing")
                    <span class="btn btn-warning">{{ $order->status }}</span>
                    @else
                    <span class="btn btn-success">{{ $order->status }}</span>

                    @endif</td>
                <td>
                    <a href="#view" dataid="{{$order->id}}" data-toggle="modal" class="btn btn-primary btn-sm"><i
                            class="far fa-eye" style="font-size: 15px;"></i> </a>

                </td>
                {{-- {{route('products.show', $product->id)}} --}}
            </tr>


            @endif

            @endforeach
            @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Order Quantity</th>
                <th>Customer Name</th>
                <th>Customer Location</th>
                <th>Customer Phone</th>
                <th>Orders Status</th>
                <th>Action</th>
            </tr>
        </tfoot>
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
        url:'{{route('adminViewOrders')}}',
        data:'view='+id,
        success:function(data){
          $('#view').html(data);
        }
      })
    })
  })


//   edit product javascript


// preview delete file
  $(document).ready(function(){
    $('#deliver').on('show.bs.modal', function(e){
      var id = $(e.relatedTarget).attr('dataid');
      $.ajax({
        type:'post',
        headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
        url:'{{route('adminProcessOrders')}}',
        data:'deliver='+id,
        success:function(data){
          $('#deliver').html(data);
        }
      })
    })
  })


</script>
@endsection
