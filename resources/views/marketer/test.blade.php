@extends('admin.layout')
@section('title', 'Testing')
@section('content')
    <h1>Products</h1>
    @foreach ($products as $product)
            <h3>{{ $product->product_name }}</h3>
            @foreach ($product->orders as $item)
            @if ($item->status =="Pending")
                <h3>Pending </h3>

            <table>
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->product->product_name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->billing_price }}</td>
                    <td>{{ $item->biling_city }}</td>
                    <td><img src="{{ $item->picture->file }}" style="width: 100px" alt=""></td>

                </tr>
            </table>
            @endif
            @endforeach
    @endforeach
@endsection

