@extends('admin.layout')
@section('title', 'Marketer Dashboard')
@section('content')

<!-- Info boxes -->
{{-- @if ($user->status !="free") --}}


<div class="row mt-2 mb-5">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Product Post</span>
                <span class="info-box-number">
                    {{ $totalproductposted }}
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Orders</span>
                <span class="info-box-number">{{ $totalordered }}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Delivered</span>
                <span class="info-box-number">{{ $totaldelivered }}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Pending</span>
                <span class="info-box-number">{{ $totalpending }}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->

{{-- @else
<a href="{{ route('marketer-fee') }}" class="btn btn-lg btn-warning btn-rounded">Pay Marketer fee now</a>
<marquee behavior="" direction=""> <h3 class="text-danger font-weight-bold">Your Account is Not Yet Approved</h3></marquee>
@endif --}}
<div class="text-center">
    <small>
        <a href="{{ route('store', $user->username?$user->username:"vboy") }}">{{ route('store', $user->username?$user->username:"vboy") }}
        </a>
        <p class="fa fa-copy badge badge-pill badge-light p-2 " id="copiedme" copiedme="{{ route('store',  $user->username?$user->username:"vboy") }}">
        </p>
    </small>
    <div class="toast">
        <div class="toast-header">
        </div>
        <div class="toast-body">
        </div>
    </div>

</div>
<!-- Content Wrapper. Contains page content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-5">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{ url($user->picture->file) }}"
                            alt="{{ $user->name }}">
                    </div>

                    <h3 class="profile-username text-center">{{ ucwords($user->name) }}</h3>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Phone Number:</b> <a>{{ $user->phone?$user->phone:"Not Available" }}</a>
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

                    <p class="text-muted">{{ $user->address? $user->address:"Not Available" }}</p>

                    <hr>

                    <strong><i class="far fa-envelope mr-1"></i>E-mail</strong>

                    <p class="text-muted">{{ $user->email }}</p>
                    <hr>

                    <strong><i class="far fa-envelope mr-1"></i>Address</strong>

                    <p class="text-muted">{{ $user->address?$user->address:"Not Available" }}</p>
                    <hr>

                    <strong><i class="far fa-envelope mr-1"></i>City</strong>

                    <p class="text-muted">{{ $user->city?$user->city:"Not Available" }}</p>
                    <hr>

                    <strong><i class="far fa-envelope mr-1"></i>State</strong>

                    <p class="text-muted">{{ $user->state?$user->state:"Not Avilable" }}</p>
                    <hr>

                    <strong><i class="far fa-envelope mr-1"></i>Country</strong>

                    <p class="text-muted">{{ $user->country?$user->country:"Not Available" }}</p>
                    <hr>

                    <strong><i class="far fa-envelope mr-1"></i>Zipcode</strong>

                    <p class="text-muted">{{ $user->zipcode?$user->zipcode:"Not Available" }}</p>
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
                        action="{{route('Profile.update', $user->id)}}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label"> Full Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name"
                                    value="{{ ucwords($user->name) }}" placeholder="Your Full Name">
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
                                    value="{{ $user->email }}" placeholder="Email">
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
                                <input type="tel" class="form-control" name="phone" value="{{ $user->phone }}"
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
                                {{ $user->address }}
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
                                <input type="text" class="form-control" name="city" value="{{ $user->city }}"
                                    placeholder="City">
                                @if ($errors->has('city'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('city') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">State</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="state" value="{{ $user->state }}"
                                    placeholder="State">
                                @if ($errors->has('state'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('state') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Country</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="country"
                                    value="{{ $user->country}}" placeholder="Country">
                                @if ($errors->has('country'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('country') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Zipcode</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="zipcode"
                                    value="{{ $user->zipcode }}" placeholder="Zipcode">
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
                                <label>
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

@endsection
