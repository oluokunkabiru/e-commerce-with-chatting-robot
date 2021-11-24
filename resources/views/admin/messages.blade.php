@extends('admin.layout')
@section('title', 'Customers Messages')

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <h5>Messages</h5>
                <div class="row">
                    <div class="col">
                        <small>Total Messages <span class="badge badge-pill badge-primary">{{ count($messages) }}</span></small>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <small>Total Read <span class="badge badge-pill badge-success">{{ count($read) }}</span></small>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <small>Total Unread <span class="badge badge-pill badge-danger">{{ count($unread) }}</span></small>
                    </div>
                </div>
              <ul class="list-group list-group-unbordered mb-3">
                  @foreach ($contact as $message)
                    <li class="list-group-item">
                                        <small>{{ $message->created_at }}</small>
                                         <small class="float-right">@if ($message->status!="read")
                                            <span class="text-danger">Unread</span>
                                        @else
                                        <span class="text-success">Read</span>

                                        @endif</small> <br>
                                    <b>{{ $message->name }}</b><a href="#" dataid="{{ $message->id }}" data-toggle="collapse" class="float-right message">Read <span class="fa fa-angle-double-right"></span></a>

                                    </li>
                  @endforeach


              </ul>
           </div>
            <!-- /.card-body -->
                      {{ $contact->links() }}

          </div>
          <!-- /.card -->


          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
             <h3>Message Content </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="activity">
                 <div class="messages"></div>



                </div>

                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection

@section('script')
    <script>

// $(document).ready(function(){

//   })
       $(document).ready(function(){

        $(".message").click(function(e){
        var message = $(this).attr('dataid');
        $.ajax({
        type:'post',
        headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        url:'{{route('readmessage')}}',
        data:'view='+message,
        success:function(data){
        $('.messages').html(data);
        }
        })

        $(".messages").collapse('show');
        });
        })
    </script>
@endsection
