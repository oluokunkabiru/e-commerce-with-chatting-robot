@extends('admin.layout')
@section('title', 'Marketers Request')
@section('content')

<div class="card-body">
    <h2 class="text-center font-weight-bold">Recent Marketers Request</h2>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong style="font-size:15px;">Success :{{session('success') }}</strong><br />
    </div>
    @endif


    @if($errors->any())

    <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong style="font-size:20px;">Oops!
            {{ "Kindly rectify below errors" }}</strong><br />
        @foreach ($errors->all() as $error)
        {{$error }} <br />
        @endforeach
    </div>
    @endif
            @if(count($marketers) > 0)

    <table id="recent" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Request Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
            $i =0;
            @endphp
            @foreach ($marketers as $marketer )

            <tr>
                <td scope="row">{{ ++$i }}</td>


                <td> <img src="{{url($marketer->picture->file)}}" alt="{{$marketer->name }}" style="width:100px"> </td>
                <td>{{ $marketer->name }}</td>

                <td>{{ $marketer->email }}</td>
                <td>{{ $marketer->phone }}</td>
                <td>{{ $marketer->created_at}}</td>
                <td><form action="{{ route('acceptMarketer') }}" method="post">
                    {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $marketer->id }}">
                    <button type="submit" class="btn btn-success">Approve</button>
                </form> </td>
                {{-- {{route('products.show', $product->id)}} --}}
            </tr>



            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Request Date</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
    @else
    <h3 class="text-danger text-center font-weight-bold">No Marketer Request</h3>
                @endif

</div>



{{-- /end view --}}
{{-- /end view --}}

@endsection
