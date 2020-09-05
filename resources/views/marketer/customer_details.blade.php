@extends('modals.modallayout')
@section('title', ucwords($customer->name))
@section('content')
<table class="table  table-striped table-bordered table-hover">
    <thead class="thead-dark text-center">
        <tr>
            <th>Customer</th>
            <th>Event</th>
        </tr>
    </thead>
    <tbody>
        <tr><td>Name</td><td class="text-center font-weight-bold">{{ $customer->name }}</td></tr>
        <tr><td>Email</td><td class="text-center font-weight-bold">{{ $customer->email }}</td></tr>
        <tr><td>Phone Number</td><td class="text-center font-weight-bold">{{ $customer->phone?$customer->phone:$customers->billing_phone }}</td></tr>
        <tr><td> My Product Quantities Ordered</td><td class="text-center font-weight-bold">{{ $totalmyproductorder }}</td></tr>
        <tr><td>Quantities Of All Product Ordered</td><td class="text-center font-weight-bold">{{ $totalproductorder }}</td></tr>
        <tr><td>My Total Delivered Quantities</td><td class="text-center font-weight-bold">{{ $totaldeliveredforthiscustomer }}</td></tr>
        <tr><td>My Total Pending Quantities</td><td class="text-center font-weight-bold">{{ $totalmyproductorder-$totaldeliveredforthiscustomer }}</td></tr>
        <tr><td>Total Delivered Quantities</td><td class="text-center font-weight-bold">{{ $totalproductdelivered }}</td></tr>
        <tr><td>Total Delivered Quantities</td><td class="text-center font-weight-bold">{{ $totalproductorder-$totalproductdelivered }}</td></tr>
        <tr><td>Contact Address</td><td class="text-center font-weight-bold">{{ $customer->address?$customer->address:$customers->billing_address }}</td></tr>
        <tr><td>City</td><td class="text-center font-weight-bold">{{ $customer->city?$customer->city:$customers->billing_city }}</td></tr>
        <tr><td>State</td><td class="text-center font-weight-bold">{{ $customer->state?$customer->state:$customers->billing_state }}</td></tr>
        <tr><td>ZIP Code</td><td class="text-center font-weight-bold">{{ $customer->zipcode?$customer->zipcode:$customers->billing_zipcode }}</td></tr>
        <tr><td>Country</td><td class="text-center font-weight-bold">{{ $customer->country?$customer->country:$customers->billing_country }}</td></tr>
        <tr><td>Gender</td><td class="text-center font-weight-bold">{{ $customer->gender?$customer->gender:"Not Specify" }}</td></tr>

    </tbody>
</table>
@endsection
@section('footer')
<div class="modal-footer">
    <button class="btn btn-danger btn-lg float-right mr-3" data-dismiss="modal">Close</button>
</div>
@endsection
