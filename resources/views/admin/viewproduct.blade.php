@extends('admin.layout')
@section('title', 'Edit Product')
@section('content')



<div class="row">
    <div class="col-md-4">
     <img src="" id="image" width="200px" class="img-fluid">
      <div class="form-group">

        <label for="exampleInputFile">Upload Product  Picture</label>

        <input type="file" accept="image/*" onchange="preview_image(event)" name="image" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" >

       @if ($errors->has('image'))
       <span class="invalid-feedback" role="alert">
           <strong>{{ $errors->first('image') }}</strong>
       </span>
   @endif
      </div>
      {{-- <input type="hidden" id="image_id" name="image_id"> --}}
    </div>
  <!----- //Picture -->
  <div class="col-md-4">
      <label for="">Product Name</label>
      <input type="text" placeholder="product name" name="name" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" autocomplete="" autofocus>
      @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
  </div>
  <div class="col-md-4">

    <div class="form-group">
         <label for="">Product Category</label>
        <select  id="category" name="category" class="form-control {{ $errors->has('dept') ? ' is-invalid' : '' }}">
           @if($categories)
           <option value=""></option>
            @foreach ($categories as $category )
             <option value="{{ $category->id }}">{{ $category->category }}</option>
            @endforeach
            @endif
        </select>
        @if ($errors->has('category'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('category') }}</strong>
        </span>
    @endif
</div>
</div>

<div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="">Location (state/city)</label>
        <input type="text" name="location" placeholder="Lacation (state/city)" id="location" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}">
        @if ($errors->has('location'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('location') }}</strong>
                </span>
            @endif
      </div>
    </div>
  <div class="col-md-4">
      <label for="">Old Price</label>
      <input type="number" placeholder="Old price" name="oldprice" id="oldprice" step="0.01" class="form-control {{ $errors->has('oldprice') ? ' is-invalid' : '' }}" autocomplete="" autofocus>
      @if ($errors->has('oldprice'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('oldprice') }}</strong>
                </span>
            @endif
  </div>
  <div class="col-md-4">
    <label for="">New Price</label>
    <input type="number" placeholder="New price" name="newprice" id="newprice" step="0.01" class="form-control {{ $errors->has('newprice') ? ' is-invalid' : '' }}" autocomplete="" autofocus>
    @if ($errors->has('newprice'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('newprice') }}</strong>
    </span>
@endif
</div>

</div>

<div class="row">
    <div class="col-md-4">
        <label for="">Product Quantity</label>
        <input type="number" placeholder="Quantities" name="quantity" id="quantity" step="1" class="form-control {{ $errors->has('quantity') ? ' is-invalid' : '' }}" autocomplete="" autofocus>
        @if ($errors->has('quantity'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('quantity') }}</strong>
        </span>
    @endif
    </div>
<div class="col-md-8">
    <div class="form-group">
        <label for="comment">Product Description</label>
        <textarea class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" placeholder="Please descriped your product here, for yout customers" rows="5" id="comment"></textarea>
      </div>
      @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
</div>
</div>
@endsection

