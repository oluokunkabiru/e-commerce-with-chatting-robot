@extends('layout.mainlayout')
@section('title', 'Dashboard');
@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            @include('layout.userprofile')

        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="container-fluid">
    <div id="accordion">
        <!-------My Account Ordr----------->

         <!--------My Account----------------->
   <div class="collapse show" id="detail"  data-parent="#accordion">
    <div class="card-deck">
      <div class="card">
        <div class="card-title pb-2 pt-2 text-center bg-light"><h5> {{ Auth::user()->name }} <span class="fa fa-home  float-right text-warning pr-3"></span> </h5></div>
      <div class="card-body">
          {{-- <p> --}}
            <a class="text-center btn btn-lg btn-block"  href="{{ route('home') }}">
             <img src="{{ Auth::user()->picture->file }}" class="img-fluid card-img">
            </a>
          {{-- </p> --}}
         <div class="container  m-5">
           <div class="row">
             <div class="col-sm-5 col-md-2 ">Address:</div>
             <div class="col-sm-7 col-md-10 ">
             @if(Auth::user()->address=='')
             <span class="text-danger"> {{ ' No Address set yet' }}</span>
             @endif

             @if(Auth::user()->address!='')
             {{ Auth::user()->address }}
            @endif

             </div>
           </div>
           <div class="row">
            <div class="col-sm-5 col-md-2 ">City:</div>
            <div class="col-sm-7 col-md-10 ">
            @if(Auth::user()->city=='')
            <span class="text-danger"> {{ ' No City set yet' }}</span>
            @endif

            @if(Auth::user()->city!='')
            {{ Auth::user()->city }}
           @endif

            </div>
          </div>

          <div class="row">
            <div class="col-sm-5 col-md-2 ">State:</div>
            <div class="col-sm-7 col-md-10 ">
            @if(Auth::user()->state=='')
            <span class="text-danger"> {{ ' No State set yet' }}</span>
            @endif

            @if(Auth::user()->state!='')
            {{ Auth::user()->state }}
           @endif

            </div>
          </div>

          <div class="row">
            <div class="col-sm-5 col-md-2 ">Zipcode:</div>
            <div class="col-sm-7 col-md-10 ">
            @if(Auth::user()->zipcode=='')
            <span class="text-danger"> {{ ' No Zipcode set yet' }}</span>
            @endif

            @if(Auth::user()->zipcode!='')
            {{ Auth::user()->zipcode }}
           @endif

            </div>
          </div>

         </div>

      </div>
    </div>
    <div class="card">
        <div class="card-title pb-2 pt-2 text-center bg-light"><h5>ACCOUNT DETAILS <span class="fa fa-edit  float-right text-warning pr-3"></span> </h5></div>
      <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success" role="alert" >
            {{ session('success') }}
          </div>
        @endif
        @if($errors->any())

        <div class="alert alert-danger alert-dismissible fade show">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong style="font-size:25px;">Oops!
               {{ "Kindly rectify below errors" }}</strong><br/>
          @foreach ($errors->all() as $error)
          {{$error }} <br/>
          @endforeach
        </div>
        @endif

        <form method="post" action="{{ route('profile.update', auth()->id()) }}" enctype="multipart/form-data">

            @csrf
            @method('PATCH')
          <div class="row">
            <div class="col">
                <label for="">Full Name </label>
              <div class="input-group mb-3">
                <input type="text" name="name" placeholder="Full name"class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name', Auth::user()->name) }}" >
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
              @if ($errors->has('name'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('name') }}</strong>

              </span>
          @endif
            </div>
            <div class="col">
                <label for="">Email Address </label>
             <div class="input-group mb-3">
               <input type="text" name="email"  placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email', Auth::user()->email) }}" >
               <div class="input-group-append">
                 <div class="input-group-text">
                   <span class="fas fa-envelope"></span>
                 </div>
               </div>
             </div>
             @if ($errors->has('email'))
             <span class="invalid-feedback" role="alert">
                 <strong>{{ $errors->first('email') }}</strong>
             </span>
         @endif
           </div>
          </div>
          <div class="row">
            <div class="col">
                <label for="">Phone Number</label>
              <div class="input-group mb-3">
                <input type="text" name="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                @if(Auth::user()->phone !='')
                    value="{{ old('phone', Auth::user()->phone) }}"
                @endif
                @if(Auth::user()->phone =='')
                    placeholder="Phone Number"
                @endif
                >
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-tel"></span>
                  </div>
                </div>
              </div>
              @if ($errors->has('phone'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('phone') }}</strong>
              </span>
          @endif
            </div>
            <div class="col">
                <label for="">Address</label>
             <div class="input-group mb-3">
               <textarea  name="address"
               @if(Auth::user()->address =='')
               placeholder="No address add yet, Please provide full address"
                @endif
             class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}">
             @if(Auth::user()->address !='')
             {{ old('address', Auth::user()->address) }}
            @endif
            </textarea>
               <div class="input-group-append">
                 <div class="input-group-text">
                   <span class="fas fa-pointer"></span>
                 </div>
               </div>
             </div>
             @if ($errors->has('address'))
             <span class="invalid-feedback" role="alert">
                 <strong>{{ $errors->first('address') }}</strong>
             </span>
         @endif
           </div>
          </div>


          <div class="row">
            <div class="col">
                <label for="">City</label>

                <div class="input-group mb-3">
                  <input type="text" name="city" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}"
                  @if(Auth::user()->city !='')
                      value="{{ old('city', Auth::user()->city) }}"
                  @endif
                  @if(Auth::user()->city =='')
                      placeholder="City is not yet set"
                  @endif
                  >
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>

              @if ($errors->has('city'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('city') }}</strong>
              </span>
                 @endif
            </div>

            <div class="col">
                <label for="">State</label>
                <div class="input-group mb-3">
                  <input type="text" name="state" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}"
                  @if(Auth::user()->city !='')
                      value="{{ old('state', Auth::user()->state) }}"
                  @endif
                  @if(Auth::user()->state =='')
                      placeholder="State is not yet set"
                  @endif
                  >
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>

              @if ($errors->has('state'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('state') }}</strong>
              </span>
                 @endif
            </div>
         </div>
         <div class="row">
            <div class="col">
                <label for="">Zipcode</label>

                <div class="input-group mb-3">
                  <input type="text" name="zip" class="form-control{{ $errors->has('zip') ? ' is-invalid' : '' }}"
                  @if(Auth::user()->zipcode !='')
                      value="{{ old('zip', Auth::user()->zipcode) }}"
                  @endif
                  @if(Auth::user()->zipcode =='')
                      placeholder="Zipcode is not yet set"
                  @endif
                  >
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>

              @if ($errors->has('zip'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('zip') }}</strong>
              </span>
                 @endif
            </div>

            <div class="col">
                <label for="">Role</label>
                <div class="input-group mb-3">
                    <select name="role" class="custom-select-sm">
                        <option value="{{ Auth::user()->role }}" selected>{{ Auth::user()->role }}</option>
                        <option value="marketer">Marketer</option>
                        <option value="user">User</option>
                      </select>
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>

              @if ($errors->has('state'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('state') }}</strong>
              </span>
                 @endif
            </div>
         </div>
         <div class="row">
            <div class="col">
                <label for="">Country</label>
                <div class="input-group mb-3">
                  <input type="text" name="country" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}"
                  @if(Auth::user()->country !='')
                      value="{{ old('country', Auth::user()->country) }}"
                  @endif
                  @if(Auth::user()->country =='')
                      placeholder="Country is not yet set"
                  @endif
                  >
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>

              @if ($errors->has('country'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('country') }}</strong>
              </span>
                 @endif
            </div>

            <div class="col">
                <label for="">Profile Picture</label>
                <div class="input-group mb-3">
                    <input type="file" class="form-control-file border" name="profile_picture">

                </div>

              @if ($errors->has('state'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('state') }}</strong>
              </span>
                 @endif
            </div>
         </div>

          <div class="row">
             <div class="col">
                <label for="">Password</label>
               <div class="input-group mb-3">
                 <input type="password" name="password"  placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}">
                 <div class="input-group-append">
                   <div class="input-group-text">
                     <span class="fas fa-lock"></span>
                   </div>
                 </div>
               </div>
               <small> if you don't want to change your password leave it blank</small>
               @if ($errors->has('password'))
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $errors->first('password') }}</strong>
               </span>
           @endif
             </div>
             <div class="col">
                <label for="">Confirm Password</label>

               <div class="input-group mb-3">
                 <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password">
                 <div class="input-group-append">
                   <div class="input-group-text">
                     <span class="fas fa-lock"></span>
                   </div>
                 </div>
               </div>
             </div>
           </div>
           <button type="submit" class="btn-success text-center btn btn-lg btn-block">
            Update
           </button>
        </form>
      </div>
      </div>


  </div>
   </div>

   <!--------Orders ------------->
   <div class="collapse" id="order"  data-parent="#accordion">
  <div class="card-deck">
    <div class="card">

      <div class="card-title pb-2 pt-2 text-center bg-light"><h5>ORDERS HISTORY <span class="fas fa-shopping-cart  float-right text-warning pr-3"></span> </h5></div>
      {{-- @if($orders) --}}
      <div id="product"></div>
    <table id="example1" class="table table-striped table-bordered table-responsive-sm m-2">
      <thead class="text-white bg-dark">
        <tr>
          <th>S/N</th>
          <th>Product Name</th>
          <th>Image</th>
          <th>Quantity</th>
          <th>Size</th>
          <th>Price (<span class="fa">&#8358;</span>)</th>
          <th>Color</th>
          <th>Status</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody class="">
          @php
            $i=1;
            @endphp

            {{-- @foreach($orders as $order) --}}
        <tr>
          <td>{{ ++$i }}</td>
          @php
        //   $picture=$order->picture ? $order->picture->file : "";
        //  $product_name = $order->products ? $order->products->product_name : " Not available";
        //  $image = $order->products ? $order->products->product_name : " Not available";
          @endphp
          {{-- <td>{{ $order->product_name }}</td>
          <td><img src="{{ asset($picture) }}" class="w-25" style="padding: 0%; margin: 0%;" alt="ok"></td>
          <td>{{ $order->quantity }}</td>
          <td>{{ $order->product_size }}</td>
          <td> ₦ {{ $order->product_price }}</td>
          <td> {{ $order->product_color }}</td>
          <td>{{ $order->status }}</td>
          <td>{{ $order->created_at }}</td> --}}
        </tr>
        {{-- @endforeach --}}
      </tbody>
      <tfoot>
        <tr>
            <th>S/N</th>
            <th>Product Name</th>
            <th>Image</th>
            <th>Quantity</th>
            <th>Size</th>
            <th>Price (<span class="fa">&#8358;</span>)</th>
            <th>Color</th>
            <th>Status</th>
            <th>Date</th>
        </tr>
      </tfoot>
    </table>
{{-- @endif --}}
    </div>
</div>
</div>
@endsection
