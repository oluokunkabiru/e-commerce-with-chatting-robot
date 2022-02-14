@extends('admin.layout')
@section('title', 'Disabled Product')


@section('content')
<!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
        <div class="jumbotron">
            <a href="#newproduct" class="btn btn-primary" data-toggle="modal"> Add new product</a>
            <div class="card-header">
              <h1 class="font-weight-bold text-center">Disabled Product</h1>
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
                  <th>Status</th>
                  <th>Location</th>
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
                  <td> <img src="{{url($picture)}}" alt="{{$picture }}" style="width:100px"> </td>
                  <td>{{ $product->product_name }}</td>
                  <td>{{ $product->newprice}}</td>
                  <td>
                      @if ($product->status=="pending")

                      <a href="#approve" class="btn btn-danger btn-rounded">Pending</a>

                      @elseif ($product->status=="disable")
                      <a href="#approve" class="btn btn-warning btn-rounded">Warning</a>
                    @else
                    <a href="#approve" class="btn btn-success btn-rounded">Active</a>

                      @endif
                  </td>
                  <td>{{ $product->location }}</td>
                  <td>{{ $product->description }}</td>
                  <td>
                        {{-- <a href="#orderfood" class ="btn btn-primary orderfood float-right btn-block" data-toggle="modal" dataid=""><span class="fas fa-shopping-cart" style="font-size: 25px;"></span></a>                                     </form> --}}

                        <a href="#view" dataid="{{$product->id}}" data-toggle="modal" class="btn btn-primary btn-sm" href="#" ><i class="far fa-eye"  style="font-size: 12px;"></i> </a>
                        || <a href="#edit"  dataid="{{$product->id}}" data-toggle="modal" class="btn btn-primary btn-sm" href="#" ><i class="far fa-edit"  style="font-size: 12px;"></i> </a>
                        || <a href="#delete" dataid="{{$product->id}}" data-toggle="modal" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt" style="font-size: 12px;"></i> </a>
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
                   <th>Status</th>
                   <th>Location</th>
                   <th>Description</th>
                   <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            {{--  <div class="float-right">
                {{ $products->links() }}
            </div>  --}}


{{-- view product --}}
            <div class="modal" id="view">          </div>

    {{-- end view product --}}
    {{-- edit product --}}
    <div class="modal" id="edit"></div>
    {{-- /end view --}}



              {{-- /end view --}}

              <div class="modal" id="delete"></div>



      <div class="modal fade" id="newproduct" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="modal-title">Add new product</h2>
              <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">Close</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('adminproduct')}}" method="post" enctype="multipart/form-data">
                    {{ @csrf_field() }}

                    <div class="row">
                        <div class="col-md-4">
                         <img src="" id="image" width="200px" class="img-fluid">
                          <div class="form-group">

                            <label for="exampleInputFile">Upload Product  Picture</label>

                            <input type="file" accept="image/*" onchange="preview_image(event)" name="image" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" >

                           @if ($errors->has('image'))
                           <span class="invalid-feedback" role="alert">
                               <strong>{{ $errors->first('image') }}</strong>
                           </span>
                       @endif

                          </div>
                          {{-- <input type="hidden" id="image_id" name="image_id"> --}}
                        </div>
                      <!----- //Picture -->
                      <div class="col-md-4">
                          <label for="">Product Name</label>
                          <input type="text" placeholder="product name" name="name" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" autocomplete="" autofocus>
                          @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                      </div>
                      <div class="col-md-4">

                        <div class="form-group">
                             <label for="">Product Category</label>
                            <select  id="category" name="category" class="form-control {{ $errors->has('dept') ? ' is-invalid' : '' }}">
                               @if($categories)
                               <option value=""></option>
                                @foreach ($categories as $category )
                                 <option value="{{ $category->id }}">{{ $category->category }}</option>
                                @endforeach
                                @endif
                            </select>
                            @if ($errors->has('category'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('category') }}</strong>
                            </span>
                        @endif
                    </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Location (state/city)</label>
                            <input type="text" name="location" placeholder="Location (state/city)" id="location" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}">
                            @if ($errors->has('location'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif
                          </div>
                        </div>
                      <div class="col-md-3">
                          <label for="">Last Price</label>
                          <input type="number" placeholder="Last Price" name="oldprice" id="oldprice" step="0.01" class="form-control {{ $errors->has('oldprice') ? ' is-invalid' : '' }}" autocomplete="" autofocus>
                          @if ($errors->has('oldprice'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('oldprice') }}</strong>
                                    </span>
                                @endif
                      </div>
                      <div class="col-md-3">
                        <label for="">Normal Price</label>
                        <input type="number" placeholder="Normal Price" name="newprice" id="newprice" step="0.01" class="form-control {{ $errors->has('newprice') ? ' is-invalid' : '' }}" autocomplete="" autofocus>
                        @if ($errors->has('newprice'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('newprice') }}</strong>
                        </span>
                    @endif
                    </div>
                    <div class="col-md-3">
                        <label for="">Product Quantity</label>
                        <input type="number" placeholder="Quantities" name="quantity" id="quantity" step="1" class="form-control {{ $errors->has('quantity') ? ' is-invalid' : '' }}" autocomplete="" autofocus>
                        @if ($errors->has('quantity'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('quantity') }}</strong>
                        </span>
                    @endif
                    </div>
                    </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <textarea name="description" class="textarea form-control" placeholder="Please enter Product descriptions" rows="4"></textarea>
                                @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>
                    </div>
                            <div class="modal-footer justify-content-between">
                                <button type="submit" class="btn btn-success btn-block btn-lg">Add Product</button>
                              </div>

                        </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
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



$(document).ready(function(){
    $('#view').on('show.bs.modal', function(e){
      var id = $(e.relatedTarget).attr('dataid');
      $.ajax({
        type:'post',
        headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
        url:'{{route('viewproducts')}}',
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
        url:'{{route('vieweditproducts')}}',
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
        url:'{{route('viewdeleteproducts')}}',
        data:'delete='+id,
        success:function(data){
          $('#delete').html(data);
        }
      })
    })
  })


  </script>

@endsection


