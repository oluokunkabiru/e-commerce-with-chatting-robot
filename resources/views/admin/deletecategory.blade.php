@extends('modals.modallayout')
@section('content')
<h3>Are you sure you want delete <b>{{ $delete->category }} .</b>?</h3>
<br>
<p><strong class="danger">You must delete all product in this category before deleting this category,
    else this category wouldn't be able to delete </strong></p>
<form  role="form" runat="server" method ="POST" action="{{ route('category.destroy', $id) }} ">
<input type="hidden"  value = "DELETE" name="_method" >
{{ csrf_field() }}
<button type="submit"  class="btn btn-danger btn-lg ml-3">Delete </button>
<a href ="#"  class="btn btn-success btn-lg float-right mr-3" data-dismiss="modal">Cancel</a>
    </form>
@endsection
