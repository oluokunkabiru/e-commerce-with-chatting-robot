@extends('modals.modallayout')
@section('content')
<h3>Are you sure you want update <b>{{ $edit->category }} .</b>?</h3>
<br>
<form  role="form" runat="server" method ="POST" action="{{ route('category.update', $id) }} ">
    @method('PUT')
    {{ csrf_field() }}
    <div class="row mb-2">
        <div class="col-md-4 ">
         <label for="">Category Name</label>
        </div>
        <div class="col-md-8">
           <input type="text" placeholder="Category name" name="category" id="name" value="{{ $edit->category }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" autocomplete="" autofocus>
           @if ($errors->has('name'))
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $errors->first('name') }}</strong>
                     </span>
                 @endif
        </div>
   </div>
   {{--  @section('footer')  --}}
        <button type="submit"  class="btn btn-success btn-lg btn-block ml-3">Update Category </button>

     {{--  @endsection  --}}
     </form>
@endsection
