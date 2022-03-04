@extends('admin.layout')
@section('title', Auth::user()->name. " Users")
@section('content')
<table id="customer" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Role</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i=0;
        @endphp

  @foreach ($customers as $customer)
        <tr>
            <td scope="row">{{ ++$i }}</td>
            <td><img src="{{url( $customer->picture->file) }}" alt="{{ $customer->name }}" style="width: 100px"></td>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->role }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->phone?$customer->phone:"NILL" }}</td>
            <td> <a href="{{ route('users-details', [$customer->id, $customer->name]) }}"   class="btn btn-primary">More </a></td>

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
