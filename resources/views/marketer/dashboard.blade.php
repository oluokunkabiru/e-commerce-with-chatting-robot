@extends('marketer.layout')
@section('title', 'Marketer Dashboard')
@section('content')

<!-- Info boxes -->
<div class="row mt-2 mb-5">
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Total Product Post</span>
          <span class="info-box-number">
              {{ $totalproductposted }}
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Total Orders</span>
          <span class="info-box-number">{{ $totalordered }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Total Delivered</span>
          <span class="info-box-number">{{ $totaldelivered }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Total Pending</span>
          <span class="info-box-number">{{ $totalpending }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  <div class="card-body">
      <h2 class="text-center font-weight-bold">Recent Orders</h2>
    <table id="product" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>ID</th>
         <th>Image</th>
        <th>Name</th>
        <th>Order Quantity</th>
        <th>Customer Name</th>
        <th>Customer Location</th>
        <th>Customer Phone</th>
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
        <td> <img src="{{$picture}}" alt="{{$picture }}" style="width:100px"> </td>
        <td>{{ $order->product_name }}</td>
        <td>{{ $order->quantity}}</td>
        <td>{{ $order->user->name }}</td>
        <td>{{ $order->billing_city }}</td>
        <td>{{ $order->billing_phone }}</td>
        <td>
           <a href="#view" dataid="{{$order->id}}" data-toggle="modal" class="btn btn-primary btn-sm" ><i class="far fa-eye"  style="font-size: 12px;"></i> </a>
              || <a href="#edit"  dataid="{{$order->id}}" data-toggle="modal" class="btn btn-primary btn-sm" href="#" ><i class="far fa-edit"  style="font-size: 12px;"></i> </a>
              || <a href="#delete" dataid="{{$order->id}}" data-toggle="modal" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt" style="font-size: 12px;"></i> </a>
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
       <th>Action</th>
      </tr>
      </tfoot>
    </table>
  </div>
<a href="{{ route('test') }}">test</a>

<div class="modal" id="view"> </div>

{{-- end view product --}}
{{-- edit product --}}
<div class="modal" id="edit"></div>
{{-- /end view --}}
{{-- /end view --}}

<div class="modal" id="delete"></div>
@endsection

@section('script')
  <script>
    //   tabile
       $(function () {
      $('#product').DataTable();
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
        url:'{{route('marketervieworder')}}',
        data:'view='+id,
        success:function(data){
          $('#view').html(data);
        }
      })
    })
  })


//   edit product javascript

$(document).ready(function()
    {
    $('#edit').on('show.bs.modal', function(e){
      var id = $(e.relatedTarget).attr('dataid');
      $.ajax({
        type:'post',
        headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
        url:'{{route('marketervieweditproduct')}}',
        data:'edit='+id,
        success:function(data){
          $('#edit').html(data);
        }
      })
    })
    })

// preview delete file
  $(document).ready(function(){
    $('#delete').on('show.bs.modal', function(e){
      var id = $(e.relatedTarget).attr('dataid');
      $.ajax({
        type:'post',
        headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
        url:'{{route('marketerviewdeleteproduct')}}',
        data:'delete='+id,
        success:function(data){
          $('#delete').html(data);
        }
      })
    })
  })


  </script>
@endsection
