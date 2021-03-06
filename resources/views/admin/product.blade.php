@extends('admin.layout')
@section('title', 'Managed Product')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="jumbotron">
            <a href="#newproduct" class="btn btn-primary" data-toggle="modal"> Add new product</a>
            <div class="card-header">
              <h1 class="font-weight-bold text-center">Manage Product</h1>
            </div>
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong style="font-size:25px;">Success :{{session('success') }}</strong><br/>
            </div>
            @endif

            @if(session('typeerror'))
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong style="font-size:25px;">Oops!
                     {{session('typeerror') }}</strong><br/>
            </div>
            @endif



            @if($errors->any())

            <div class="alert alert-danger alert-dismissible fade show">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong style="font-size:25px;">Oops!
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
                  <th>Department </th>
                  <th>Old Price</th>
                  <th>New Price</th>
                  <th>Location</th>
                  <th>Quantity</th>
                  <th>Description</th>

                  <th>Date posted</th>
                  <th>Action</th>
                  <th>Date Posted</th>
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
                  <td>{{ $categorys }}</td>
                  <td>{{ $product->oldprice }}</td>
                  <td>{{ $product->newpric }}</td>

                  <td>{{ $product->location }}</td>
                  <td>{{ $product->quantity }}</td>
                  <td>{{ $product->description }}</td>
                  <td>{{ $product->city}}</td>
                  <td>{{ $product->region }}</td>

                  <td>{{ $product->created_at }}</td>
                </tr>
                    @endforeach
                @endif


                </tbody>
                <tfoot>
                <tr>
                    <th>ID</th>
                   <th>Image</th>
                  <th>Name</th>
                  <th>Department </th>
                  <th>Old Price</th>
                  <th>New Price</th>
                  <th>Location</th>
                  <th>Quantity</th>
                  <th>Description</th>
                  <th>Date posted</th>
                  <th>Action</th>
                  <th>Date Posted</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <div class="float-right">
                {{ $products->links() }}
            </div>


            <!-- /.card-body -->
          </div>
      </div><!-- /.container-fluid -->
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
                <form action="{{ route('adminProduct')}}" method="post" enctype="multipart/form-data">
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
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Location (state/city)</label>
                            <input type="text" name="location" placeholder="Lacation (state/city)" id="location" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}">
                            @if ($errors->has('location'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif
                          </div>
                        </div>
                      <div class="col-md-4">
                          <label for="">Old Price</label>
                          <input type="number" placeholder="Old price" name="oldprice" id="oldprice" step="0.01" class="form-control {{ $errors->has('oldprice') ? ' is-invalid' : '' }}" autocomplete="" autofocus>
                          @if ($errors->has('oldprice'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('oldprice') }}</strong>
                                    </span>
                                @endif
                      </div>
                      <div class="col-md-4">
                        <label for="">New Price</label>
                        <input type="number" placeholder="New price" name="newprice" id="newprice" step="0.01" class="form-control {{ $errors->has('newprice') ? ' is-invalid' : '' }}" autocomplete="" autofocus>
                        @if ($errors->has('newprice'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('newprice') }}</strong>
                        </span>
                    @endif
                    </div>

                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Product Quantity</label>
                            <input type="number" placeholder="Quantities" name="quantity" id="quantity" step="1" class="form-control {{ $errors->has('quantity') ? ' is-invalid' : '' }}" autocomplete="" autofocus>
                            @if ($errors->has('quantity'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('quantity') }}</strong>
                            </span>
                        @endif
                        </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="comment">Product Description</label>
                            <textarea class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" placeholder="Please descriped your product here, for yout customers" rows="5" id="comment"></textarea>
                          </div>
                          @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                    </div>
                    </div>


            </div>
            <div class="modal-footer justify-content-between">
              <button type="submit" class="btn btn-success btn-block btn-lg" id="addproductbt">Add Product</button>
            </div>
        </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    </section>
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
    function preview_img(event)
    {
     var reader = new FileReader();
     reader.onload = function()
     {
      var output = document.getElementById('output_image');
      output.src = reader.result;
     }
     reader.readAsDataURL(event.target.files[0]);
    }

    // add new product
    $('#addproductbtn').click(function(event){
    var form = $('#addproductform')[0];
    var formData  = new FormData(form);
$.ajax({
    type:'POST',
    url: 'addproduct',
    data: formData,

    success: function (data) {
    var result=data;
    // $("#fooditemerror").html(result);
    // if(result=="Category Created"){
    //  window.location.assign('managefood');
    //  }
    },
    cache:false,
    contentType:false,
    processData:false
});

event.preventDefault();
})

  </script>

@endsection


