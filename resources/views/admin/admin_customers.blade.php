@extends('admin.layout')
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
        $i=0;
    @endphp

@foreach ($customers as $customer =>$value)
    <tr>
        <td scope="row">{{ ++$i }}</td>
        <td><img src="../{{ $customers[$customer]->picture->file }}" alt="{{ $customers[$customer]->name }}" style="width: 100px"></td>
        <td>{{ $customers[$customer]->name }}</td>
        <td>{{ $customers[$customer]->email }}</td>
        <td>{{ $customers[$customer]->phone?$customers[$customer]->phone:$order[$customer]->billing_phone }}</td>
        <td> <a href="#view" dataid="{{$customers[$customer]->id}}" data-toggle="modal" class="btn btn-primary">More </a></td>

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
        url:'{{route('customersInformtion')}}',
        data:'view='+id,
        success:function(data){
          $('#view').html(data);
        }
      })
    })
  })

        </script>
@endsection
