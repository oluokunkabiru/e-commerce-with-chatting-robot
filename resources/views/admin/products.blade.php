@extends('admin.layout')
@section('title', 'Managed Product')


@section('content')
<!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
        <div class="jumbotron">
            <div class="card-header">
              <h1 class="font-weight-bold text-center">All Manage Product</h1>
            </div>
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong style="font-size:15px;">Success :{{session('success') }}</strong><br/>
            </div>
            @endif

            @if(session('typeerror'))
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong style="font-size:20px;">Oops!</strong><br/>
                    <strong> {{session('typeerror') }}</strong>
            </div>
            @endif



            @if($errors->any())

            <div class="alert alert-danger alert-dismissible fade show">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong style="font-size:20px;">Oops!
                   {{ "Kindly rectify below errors" }}</strong><br/>
              @foreach ($errors->all() as $error)
              {{$error }} <br/>
              @endforeach
            </div>
            @endif
            <!-- /.card-header -->
            <div class="card-body">
              <table id="product" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                   <th>Image</th>
                  <th>Name</th>
                  <th>New Price</th>
                  <th>Location</th>
                  <th>Marketer Name</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php
                $i =0;
                @endphp
                @if($products)
                @foreach ($products as $product )
              <tr>
                <td scope="row">{{ ++$i }}</td>
                  @php
                 $picture= $product->picture ? $product->picture->file :"";
                  @endphp
                    @php
                 $categorys = $product->category ? $product->category->category:"";
                  @endphp
                  <td> <img src="../{{$picture}}" alt="{{$picture }}" style="width:100px"> </td>
                  <td>{{ $product->product_name }}</td>
                  <td>{{ $product->newprice}}</td>
                  <td>{{ $product->location }}</td>
                  <td>{{ $product->description }}</td>
                  <td>
                        {{-- <a href="#orderfood" class ="btn btn-primary orderfood float-right btn-block" data-toggle="modal" dataid=""><span class="fas fa-shopping-cart" style="font-size: 25px;"></span></a>                                     </form> --}}

                     <a href="#view" dataid="{{$product->id}}" data-toggle="modal" class="btn btn-primary btn-sm" href="#" ><i class="far fa-eye"  style="font-size: 15px;"></i> </a>
                        || <a href="#edit"  dataid="{{$product->id}}" data-toggle="modal" class="btn btn-primary btn-sm" href="#" ><i class="far fa-edit"  style="font-size: 15px;"></i> </a>
                        || <a href="#delete" dataid="{{$product->id}}" data-toggle="modal" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> </a>
                    </td>
                    {{-- {{route('products.show', $product->id)}} --}}
                </tr>
                    @endforeach
                @endif


                </tbody>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                   <th>Name</th>
                   <th>New Price</th>
                   <th>Location</th>
                   <th>Description</th>
                   <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <div class="float-right">
                {{ $products->links() }}
            </div>


{{-- view product --}}
            <div class="modal" id="view">          </div>

    {{-- end view product --}}
    {{-- edit product --}}
    <div class="modal" id="edit"></div>
    {{-- /end view --}}
    <div class="modal" id="test">
       <div class="result"></div>
      </div>


              {{-- /end view --}}

              <div class="modal" id="delete"></div>




      </div>
        </div>
@endsection

@section('script')

<script>
    // table view
    $(function () {
      $('#product').DataTable();

    // $('#product').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": true,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    // });
  });



    // image preview

    function preview_image(event)
    {
     var reader = new FileReader();
     reader.onload = function()
     {
      var output = document.getElementById('image');
      output.src = reader.result;
     }
     reader.readAsDataURL(event.target.files[0]);
    }




event.preventDefault();
})
// view javascript

$(document).ready(function(){
    $('#view').on('show.bs.modal', function(e){
      var id = $(e.relatedTarget).attr('dataid');
      $.ajax({
        type:'post',
        headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
        url:'{{route('viewproduct')}}',
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
        url:'{{route('vieweditproduct')}}',
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
        url:'{{route('viewdeleteproduct')}}',
        data:'delete='+id,
        success:function(data){
          $('#delete').html(data);
        }
      })
    })
  })


  </script>

@endsection


