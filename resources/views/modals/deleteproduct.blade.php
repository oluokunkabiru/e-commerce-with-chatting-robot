@extends('modals.modallayout')
@section('content')
<h3>Are you sure you want delete <b>{{ $delete->product_name }} .</b>?</h3>
<br>
<form role="form" runat="server" method="POST" action="{{ route('products.destroy', $delete->id) }} ">
    @method('delete')
    {{ csrf_field() }}
    <button type="submit" class="btn btn-danger btn-lg ml-3">Delete </button>
    <a href="#" class="btn btn-success btn-lg float-right mr-3" data-dismiss="modal">Cancel</a>
</form>
@endsection
