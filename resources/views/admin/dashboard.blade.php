@extends('admin.layout')
@section('title', 'Admin Dashboard')
@section('content')

<!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->

        <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{ $totalusers }}</h3>

                  <p>Total Users</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{ $totalproduct }}<sup style="font-size: 20px"></sup></h3>

                  <p>Total Products</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{ route('allproduct') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{ $totalorders }}</h3>

                  <p>Total Orders</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="{{ route('allOrders') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>{{ $totaldelivered }}</h3>

                  <p>Total Delivered</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{ route('allOrders') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>

            <!-- ./card-body -->
            <div class="card-footer">
                <div class="row">
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>
                      <h5 class="description-header"><span class="fa">&#8358;</span>{{  number_format($totalrevenue,2,".",",")     }}</h5>
                      <span class="description-text">TOTAL REVENUE</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>
                      <h5 class="description-header"><span class="fa">&#8358;</span>{{ number_format($totalunpaid,2,".",",")  }}</h5>
                      <span class="description-text">UNPAID BALANCE</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>
                      <h5 class="description-header"><span class="fa">&#8358;</span>{{  number_format($totalrevenue,2,".",",")     }}</h5>
                      <span class="description-text">TOTAL PAYOUT</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block">
                      <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>
                      <h5 class="description-header"><span class="fa">&#8358;</span>1200</h5>
                      <span class="description-text">THIS MONTH SALES</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->

<!-- Content Wrapper. Contains page content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-5">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{url($user->picture->file) }}"
                            alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center">{{ ucwords(Auth::user()->name) }}</h3>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Phone Number:</b> <a>{{ Auth::user()->phone?Auth::user()->phone:"Not Available" }}</a>
                        </li>
                    </ul>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Profile</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                    <p class="text-muted">{{ Auth::user()->address? Auth::user()->address:"Not Available" }}</p>

                    <hr>

                    <strong><i class="far fa-envelope mr-1"></i>E-mail</strong>

                    <p class="text-muted">{{ Auth::user()->email }}</p>
                    <hr>

                    <strong><i class="far fa-envelope mr-1"></i>Address</strong>

                    <p class="text-muted">{{ Auth::user()->address?Auth::user()->address:"Not Available" }}</p>
                    <hr>

                    <strong><i class="far fa-envelope mr-1"></i>City</strong>

                    <p class="text-muted">{{ Auth::user()->city?Auth::user()->city:"Not Available" }}</p>
                    <hr>

                    <strong><i class="far fa-envelope mr-1"></i>State</strong>

                    <p class="text-muted">{{ Auth::user()->state?Auth::user()->state:"Not Avilable" }}</p>
                    <hr>

                    <strong><i class="far fa-envelope mr-1"></i>Country</strong>

                    <p class="text-muted">{{ Auth::user()->country?Auth::user()->country:"Not Available" }}</p>
                    <hr>

                    <strong><i class="far fa-envelope mr-1"></i>Zipcode</strong>

                    <p class="text-muted">{{ Auth::user()->zipcode?Auth::user()->zipcode:"Not Available" }}</p>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->

        <div class="col-md-7">
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

            @if(session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Success!</strong> {{ session('success') }}
            </div>
            @endif


            <div class="card">
                <div class="card-header p-2">

                    <p class="btn btn-lg btn-block btn-primary">Update Your Profile </p>

                </div><!-- /.card-header -->
                <div class="container-fluid">
                    <form class="form-horizontal" enctype="multipart/form-data" method="POST"
                        action="{{route('Profile.update', Auth::user()->id)}}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label"> Full Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name"
                                    value="{{ ucwords(Auth::user()->name) }}" placeholder="Your Full Name">
                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" disabled class="form-control" name="email"
                                    value="{{ Auth::user()->email }}" placeholder="Email">
                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Phone Number</label>
                            <div class="col-sm-10">
                                <input type="tel" class="form-control" name="phone" value="{{ Auth::user()->phone }}"
                                    placeholder="Phone Number">
                                @if ($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>





                        <div class="form-group row">
                            <label for="inputExperience" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="inputExperience" name="address" placeholder="">
                                {{ Auth::user()->address }}
                                </textarea>
                                @if ($errors->has('address'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">City</label>
                            <div class="col-sm-10">
                                @php
                                $country = App\Models\Country::orderBy('name', 'asc')->get();
                            @endphp
                            <select name="country" id="country"  style="width: 100%;" class="form-control  {{ $errors->has('country') ? ' is-invalid' : '' }}">
                                <option value="">Choose Your Country</option>
                                @foreach ($country as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach

                              </select>



                            @if ($errors->has('country'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('country') }}</strong>
                                </span>
                            @endif

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">State</label>
                            <div class="col-sm-10" id="statelist">
                                <select name="state" id="state"  style="width: 100%;" class="form-control  {{ $errors->has('state') ? ' is-invalid' : '' }}">
                                    <option value="">Choose Your State</option>
                                  </select>
                                @if ($errors->has('state'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Country</label>
                            <div class="col-sm-10" id="citylist">
                                <select name="city" id="city"  style="width: 100%;" class="form-control  {{ $errors->has('city') ? ' is-invalid' : '' }}">
                                    <option value="">Choose Your City</option>
                                  </select>
                                @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Zipcode</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="zipcode"
                                    value="{{ Auth::user()->zipcode }}" placeholder="Zipcode">
                                @if ($errors->has('zipcode'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('zipcode') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="password" class="form-control" id="inputSkills"
                                    placeholder="">
                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label"> Confirm Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="password_confirmation" class="form-control"
                                    id="inputSkills" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                                <label class="text-danger">
                                    If you dont want to change your password,leave it as blank. </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                                <button type="submit" class="btn btn-primary btn-block">Update</button>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
        <!-- /.tab-pane -->
    </div>
    <!-- /.tab-content -->
</div><!-- /.card-body -->
{{-- @endsection  --}}

@endsection


@section('script')
<script>
    function pageLoading(){
            $(".loader-wrapper.loader-off, body.is-loaded .loader-wrapper").css('visibility', 'visible').css('opacity', '1');

        }

        function pageLoaded(){
            $(".loader-wrapper.loader-off, body.is-loaded .loader-wrapper").css('visibility', 'hidden').css('opacity', '0');

        }



    $(document).ready(function() {


     $('select').select2()


$(document).on('change', '#country', function() {
    var country = $(this).val();
    // alert(country)
    $.ajax({
    headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
    },
    type: 'POST',
    url: '{{ route('state-list') }}',
    data: 'country=' + country,
    success: function(data) {
        $("#statelist").html(data)

    },
        beforeSend:function(){
           pageLoading();
        },

        complete:function(){
            pageLoaded();
        }

    })

})





    $(document).on('change', '#state', function() {
    var state = $(this).val();
    // alert(country)
    $.ajax({
    headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
    },
    type: 'POST',
    url: '{{ route('cities-list') }}',
    data: 'state=' + state,
    success: function(data) {
        $("#citylist").html(data)

    },
        beforeSend:function(){
           pageLoading();
        },

        complete:function(){
            pageLoaded();
        }

    })

})



    })
</script>

@endsection


