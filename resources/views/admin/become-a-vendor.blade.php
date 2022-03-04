@extends('admin.layout')
@section('title', 'Managed Vendor Instruction')
@section('content')

        <div class="jumbotron">
            <a href="#newcategory" class="btn btn-primary" data-toggle="modal"> Add new Instruction</a>

            <div class="card-header">
              <h1 class="font-weight-bold text-center">Manage vendor Instruction</h1>
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
                  <th>Title</th>
                  <th>Description</th>
                  <th>Date posted</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php
                $i =0;
                @endphp
                @if($vendors)
                @foreach ($vendors as $vendor )
              <tr>
                {{-- @php
                $picture= $vendor->picture ? $vendor->picture->file :"";
                 @endphp --}}
                <td scope="row">{{ ++$i }}</td>

                  {{-- <td><img src="{{ asset($picture) }}" style="width: 80px" alt=""></td> --}}
                <td>{{ ucwords($vendor->topic) }}</td>
                <td>{!! $vendor->description !!}</td>



                  <td>{{ $vendor->created_at }}</td>
                  <td>
                     <a href="#edit"
                     url="{{  route('how-to-become-a-vendow.update', $vendor->id) }}"
                     title = "{{ $vendor->topic }}"
                     description = "{{ $vendor->description }}"
                     {{-- image = "{{ $picture }}" --}}
                     data-toggle="modal" class="btn btn-primary btn-sm" href="#" >
                     <i class="far fa-edit"  style="font-size: 12px;"></i> </a>
                    || <a href="#delete"
                    url="{{ route('how-to-become-a-vendow.destroy', $vendor->id )}}"
                    {{-- image = "{{ $picture }}" --}}
                    title = "{{ $vendor->topic }}"


                    data-toggle="modal" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt" style="font-size: 12px;"></i> </a>
                  </td>
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




      {{--  <div class="modal" id="edit"></div>
      <div class="modal" id="delete"></div>  --}}

      <div class="modal fade" id="newcategory" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="modal-title">Add new Instruction</h2>
              <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">Close</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('how-to-become-a-vendow.store') }}" enctype="multipart/form-data" method="post">
                    {{ @csrf_field() }}

                    <div class="form-group">
                        <label for="usr">Title:</label>
                        <input type="text" value="{{ old('title') }}" placeholder="Title" name="title" id="name" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" autocomplete="" autofocus>
                        @if ($errors->has('title'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('title') }}</strong>
                                  </span>
                              @endif
                     </div>
                     <div class="form-group">
                        <label for="usr">Description:</label>

                        <textarea type="text" placeholder="Descriptions" name="description" id="name" class="textarea form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" autocomplete="" autofocus>
                        {{ old('description') }}
                        </textarea>
                        @if ($errors->has('description'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('description') }}</strong>
                                  </span>
                              @endif
                     </div>

                     {{-- <div class="form-group">
                         <label for="">Image Description</label>
                         <input type="file" accept="image/*" onchange="preview_image(event)" name="image" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" >
                        </div>
                      <img src="" id="image" width="200px" class="img-fluid"> --}}


                      </div>

            <div class="modal-footer justify-content-between">
              <button type="submit" class="btn btn-success btn-block btn-lg" id="addproductbt">Add Service</button>
            </div>
        </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

{{--  delete  --}}
<div class="modal fade" id="delete" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title">Are you sure to delete <span id="dtitle"></span> </h2>
          <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">Close</span>
          </button>
        </div>
        <form id="deleteform" enctype="multipart/form-data" method="post">

        <div class="modal-body">
                {{ @csrf_field() }}
                @method('delete')
                <img src="" id="dimage" style="width: 200px" alt="">
        </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-danger btn-block btn-lg" id="addproductbt">Delete Service</button>
                  </div>
              </form>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>

      {{--  edit  --}}
      <div class="modal fade" id="edit" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="modal-title">Edit Instruction</h2>
              <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">Close</span>
              </button>
            </div>
            <div class="modal-body">
                <form id="editform" enctype="multipart/form-data" method="post">
                    {{ @csrf_field() }}
                    @method('put')

                    <div class="form-group">
                        <label for="usr">Title:</label>
                        <input type="text" value="{{ old('title') }}" placeholder="Title" name="title" id="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" autocomplete="" autofocus>
                        @if ($errors->has('title'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('title') }}</strong>
                                  </span>
                              @endif
                     </div>
                     <div class="form-group">
                        <label for="usr">Description:</label>

                        <textarea type="text" placeholder="Descriptions" name="description" id="description" class="textarea form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" autocomplete="" autofocus>
                        {{ old('description') }}
                        </textarea>
                        @if ($errors->has('description'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('description') }}</strong>
                                  </span>
                              @endif
                     </div>

                     {{-- <div class="form-group">
                         <label for="">Image Description</label>
                         <input type="file" accept="image/*" onchange="preview_img(event)" name="image" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" >
                        </div>
                      <img src="" id="eimage" width="200px" class="img-fluid"> --}}


                      </div>

            <div class="modal-footer justify-content-between">
              <button type="submit" class="btn btn-success btn-block btn-lg" id="addproductbt">Update Service</button>
            </div>
        </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
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
      var output = document.getElementById('eimage');
      output.src = reader.result;
     }
     reader.readAsDataURL(event.target.files[0]);
    }
    $('.textarea').summernote({
              height:150,
            toolbar: [
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link']],
                ['style', ['style']],

            ]
        })

    $(document).ready(function(){
    $('#edit').on('show.bs.modal', function(e){
        var url = $(e.relatedTarget).attr('url');
        var title = $(e.relatedTarget).attr('title');
        var description = $(e.relatedTarget).attr('description');
        var image = $(e.relatedTarget).attr('image');
        $("#title").val(title);
        $("#description").summernote('code',description);
        $("#eimage").attr('src', image);
        $("#editform").attr('action', url);


    })
  })



  $(document).ready(function(){
    $('#delete').on('show.bs.modal', function(e){
      var url = $(e.relatedTarget).attr('url');
        var title = $(e.relatedTarget).attr('title');
        var image = $(e.relatedTarget).attr('image');
        $("#dtitle").text(title);
        $("#dimage").attr('src', image);
        $("#deleteform").attr('action', url);
    })
  })

  </script>

@endsection


