@extends('admin.layout')
@section('title', 'Managed Category')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="jumbotron">
            <a href="#newcategory" class="btn btn-primary" data-toggle="modal"> Add new Category</a>

            <div class="card-header">
              <h1 class="font-weight-bold text-center">Manage Category</h1>
            </div>
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong style="font-size:25px;">Success :{{session('success') }}</strong><br/>
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
                  <th>Name</th>

                  <th>Date posted</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php
                $i =0;
                @endphp
                @if($categories)
                @foreach ($categories as $category )
              <tr>
                <td scope="row">{{ ++$i }}</td>

                  <td>{{ $category->category }}</td>


                  <td>{{ $category->created_at }}</td>
                </tr>
                    @endforeach
                @endif


                </tbody>
                <tfoot>
                <tr>

                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
      </div><!-- /.container-fluid -->
      <div class="modal fade" id="newcategory" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="modal-title">Add new Category</h2>
              <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">Close</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="Category" method="post">
                    {{ @csrf_field() }}

                    <div class="row">
                         <div class="col-md-4">
                          <label for="">Category Name</label>
                         </div>
                         <div class="col-md-8">
                              <input type="text" placeholder="Category name" name="category" id="name" class="form-control @error('name') is-invalid  @enderror" autocomplete="" autofocus>
                          @error('name')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>

                          @enderror
                         </div>
                    </div>


                      </div>

            <div class="modal-footer justify-content-between">
              <button type="submit" class="btn btn-success btn-block btn-lg" id="addproductbt">Add Category</button>
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


