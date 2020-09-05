@extends('marketer.layout')
@section('title', Auth::user()->name. " Customers")
@section('content')
<table id="customer" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Customer Email</th>
            <th>Customer Phone</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i =0;
            $name = array();
            $image = array();
            $email = array();
            $phone = array();
            $id =array();
            $slug = array();
        @endphp

        @foreach ($customers as $customer)
        @foreach ($customer->orders as $custumer)
        @php
            $i;
            $image[$custumer->id]=$custumer->user->picture->file;
            $name [$custumer->user->id]=$custumer->user->name;
            $phone [$custumer->user->id]=$custumer->user->phone?$custumer->user->phone:$custumer->billing_phone;
            $email [$custumer->user->id]=$custumer->user->email;
            $id[$custumer->user->id] =$custumer->user->id;


        @endphp
   @endforeach
    @endforeach

@foreach ($id as $item=>$value)


    <tr>
            <td>{{ ++$i }}</td>
            <td><img src="../{{  $image[$item] }}" alt="{{$name[$item] }}" style="width: 100px"></td>
            <td>{{$name[$item]}}</td>
             <td>{{ $email[$item]}}</td>
            <td>{{ $phone[$item]}}</td>
            <td>
                 <a href="#view" dataid="{{$id[$item]}}" data-toggle="modal" class="btn btn-primary">More </a>

            </td>
</tr>
@endforeach
    </tbody>
</table>
        <div id="view" class="modal"></div>
@endsection


@section('script')
        <script>
  $(function () {
      $('#customer').DataTable();
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
        url:'{{route('marketerCustomerDetails')}}',
        data:'view='+id,
        success:function(data){
          $('#view').html(data);
        }
      })
    })
  })

        </script>
@endsection
