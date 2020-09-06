@extends('modals.modallayout')
@section('title', "Edit : $edit->product_name ")
@section('content')
<form action="{{ route('adminproduct.update', $id) }}" method="post" enctype="multipart/form-data">
@method('PUT')
  <input type="hidden"  value = "{{ $id }}" name="id" >
    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-4">
                         <img src="{{ url($edit->picture->file) }}" id="image" width="200px" class="img-fluid">
                          <div class="form-group">
                            <label for="exampleInputFile">Upload Product  Picture</label>
                            <input type="file" accept="image/*" onchange="preview_image(event)" name="image" class="form-control" >
                          </div>
                        </div>
                      <!----- //Picture -->
                      <div class="col-md-4">
                      <div class="form-group">
                          <label for="">Product Name</label>
                          <input type="text" placeholder="product name" value="{{ $edit->product_name  }}" name="name" id="name" class="form-control" autocomplete="" autofocus>
                    </div>
                      </div>
                      <div class="col-md-4">

                        <div class="form-group">
                             <label for="">Product Category</label>
                            <select  id="category" name="category" class="form-control">
                               <option value="{{ $edit->category_id }}"> {{ $edit->category->category }} </option>';
                                    @foreach ($categories as $category)
                                      <option value="{{ $category->id }} ">{{ $category->category }} </option>';
                                    @endforeach
                            </select>

                    </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Location (state/city)</label>
                            <input type="text" name="location" placeholder="Location (state/city)" value="{{ $edit->location }}"  id="location" class="form-control">

                          </div>
                        </div>
                      <div class="col-md-3">
                      <div class="form-group">
                          <label for="">Old Price</label>
                          <input type="number" placeholder="Old price" min="1"  value="{{ $edit->oldprice }}"  name="oldprice" id="oldprice" step="0.01" class="form-control" autocomplete="" autofocus>
                        </div>
                      </div>
                      <div class="col-md-3">
                      <div class="form-group">
                        <label for="">New Price</label>
                        <input type="number" placeholder="New price" min="1"  value="{{ $edit->newprice }}"  name="newprice" id="newprice" step="0.01" class="form-control" autocomplete="" autofocus>
                    </div>
                    </div>
                    <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Product Quantity</label>
                        <input type="number" placeholder="Quantities" min="1"  value="{{ $edit->quantity }}"  name="quantity" id="quantity" step="1" class="form-control" autocomplete="" autofocus>
                    </div>
                    </div>

                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <textarea name="description" class="textarea form-control" placeholder="Please enter Product descriptions" rows="4">{{ $edit->description }}</textarea>
                        </div>
                        </div>
                        @section('footer')
                        <div class="modal-footer">
                     <button type="submit"  class="btn btn-success btn-lg ml-3">Update Product </button>
                            <button  class="btn btn-warning btn-lg float-right mr-3" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                        @endsection



@endsection

