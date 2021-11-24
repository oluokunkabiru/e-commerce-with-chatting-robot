@extends('admin.layout')
@section('title', "Settings")
@section('content')
<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-edit"></i>
            Settings
        </h3>
    </div>
    <div class="card-body">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong style="font-size:15px;">Success :{{session('success') }}</strong><br />
        </div>
        @endif


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

        <h4 class="mt-5 ">Settings Sections</h4>
        <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="custom-content-above-home-tab" data-toggle="pill"
                    href="#custom-content-above-home" role="tab" aria-controls="custom-content-above-home"
                    aria-selected="false">Header</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="custom-content-above-profile-tab" data-toggle="pill"
                    href="#custom-content-above-profile" role="tab" aria-controls="custom-content-above-profile"
                    aria-selected="false">Footer</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " id="custom-content-above-messages-tab" data-toggle="pill"
                    href="#custom-content-above-messages" role="tab" aria-controls="custom-content-above-messages"
                    aria-selected="true">Sidebar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="custom-content-above-settings-tab" data-toggle="pill"
                    href="#custom-content-above-settings" role="tab" aria-controls="custom-content-above-settings"
                    aria-selected="false">Blog</a>
            </li>
        </ul>

        <div class="tab-content" id="custom-content-above-tabContent">
            <div class="tab-pane  active show" id="custom-content-above-home" role="tabpanel"
                aria-labelledby="custom-content-above-home-tab">
                <div class="tab-custom-content">
                    <p class="lead mb-0 font-weight-bold">Header Settings</p>
                </div>
                <div class="card p-4">
                    <form action="{{ route('Settings.update', 1) }}" enctype="multipart/form-data" method="POST">
                        {{ csrf_field() }}
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="usr">Company Name :</label>
                                    <input type="text"
                                        class="form-control{{ $errors->has('company') ? ' is-invalid' : '' }}"
                                        name="company" value="{{ old('company', $setting->company) }}">
                                </div>
                                @if ($errors->has('company'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('company') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">

                                    <label for="usr">Logo:</label>
                                    <input type="file" accept="image/*" onchange="preview_image(event)" name="logo"
                                        class="form-control{{ $errors->has('logo') ? ' is-invalid' : '' }}">
                                </div>
                                <img src="{{ url($setting->picture->file) }}" id="image" width="200px"
                                    class="img-fluid">
                                @if ($errors->has('image'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </span>
                                @endif

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="usr">Phone Number:</label>
                                    <input type="tel"
                                        class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                        name="phone" value="{{ old('phone', $setting->phone) }}">
                                </div>
                                @if ($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                                @endif
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="usr">Support Email:</label>
                                    <input type="email"
                                        class="form-control{{ $errors->has('supportemail') ? ' is-invalid' : '' }}"
                                        name="supportemail" value="{{ old('supportemail', $setting->supportemail) }}">
                                </div>
                                @if ($errors->has('supportemail'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('supportemail') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="usr">Free Shipping Message:</label>
                                    <input type="text"
                                        class="form-control{{ $errors->has('freeshipping') ? ' is-invalid' : '' }}"
                                        name="shipping" value="{{ old('shipping', $setting->shipping ) }}">
                                </div>
                                @if ($errors->has('shipping'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('shipping') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <h3 class="font-weight-bold text-center">Social Medials</h3>
                        <div class="row">

                            <div class="col-md-6">
                                <label for="">Facebook Link</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fab fa-facebook-square"
                                                style="font-size: 20px"></i> </span>
                                    </div>
                                    <input type="url"
                                        class="form-control{{ $errors->has('facebook') ? ' is-invalid' : '' }}"
                                        placeholder="Facebook link" name="facebook"
                                        value="{{ old("facebook", $setting->facebook) }}">
                                </div>
                                @if ($errors->has('facebook'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('facebook') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label for="">Twitter Link</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fab fa-twitter-square"
                                                style="font-size: 20px"></i> </span>
                                    </div>
                                    <input type="url"
                                        class="form-control{{ $errors->has('twitter') ? ' is-invalid' : '' }}"
                                        placeholder="Twitter link" name="twitter"
                                        value="{{ old('twitter', $setting->twitter) }}">
                                </div>
                                @if ($errors->has('twitter'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('twitter') }}</strong>
                                </span>
                                @endif
                            </div>


                            <div class="col-md-6">
                                <label for="">Instagram Link</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fab fa-instagram"
                                                style="font-size: 20px"></i> </span>
                                    </div>
                                    <input type="url"
                                        class="form-control{{ $errors->has('instagram') ? ' is-invalid' : '' }}"
                                        placeholder="Instagram link" name="instagram"
                                        value="{{ old('instagram', $setting->instagram) }}">
                                </div>
                                @if ($errors->has('instagram'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('instagram') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label for="">Linkedin Link</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fab fa-linkedin"
                                                style="font-size: 20px"></i> </span>
                                    </div>
                                    <input type="url"
                                        class="form-control{{ $errors->has('linkedin') ? ' is-invalid' : '' }}"
                                        placeholder="Linkedin link" name="linkedin"
                                        value="{{ old('linkedin', $setting->linkedin) }}">
                                </div>
                                @if ($errors->has('linkedin'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('linkedin') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-right btn-lg">Submitt</button>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="custom-content-above-profile" role="tabpanel"
                aria-labelledby="custom-content-above-profile-tab">
                <div class="tab-custom-content">
                    <p class="lead mb-0 font-weight-bold">Footer Settings</p>
                </div>
                <div class="card p-4">
                    <form action="{{ route('aboutandaddress') }}" method="post">
                        @method('PUT');
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">

                    <div class="form-group">
                            <label for="comment">Address:</label>
                            <textarea class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" rows="5"   name="address">
                                {{ old('address', $setting->address) }}
                            </textarea>
                            @if ($errors->has('address'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                            @endif

                        </div>
                            </div>

                            <div class="col-md-6">

                    <div class="form-group">
                            <label for="comment">About Us:</label>
                            <textarea class="form-control{{ $errors->has('about') ? ' is-invalid' : '' }}" rows="5"   name="about">
                                {{ old('about', $setting->about) }}
                            </textarea>
                            @if ($errors->has('about'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('about') }}</strong>
                            </span>
                            @endif

                        </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-right btn-lg">Submitt</button>

                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="custom-content-above-messages" role="tabpanel"
                aria-labelledby="custom-content-above-messages-tab">
                <div class="tab-custom-content">
                    <p class="lead mb-0 font-weight-bold">Sidebar Settings</p>
                </div>
                contents
            </div>
            <div class="tab-pane fade" id="custom-content-above-settings" role="tabpanel"
                aria-labelledby="custom-content-above-settings-tab">
                <div class="tab-custom-content">
                    <p class="lead mb-0 font-weight-bold">Blogs Settings</p>
                </div>
                blogd
            </div>
        </div>
    </div>
    <!-- /.card -->
</div>
@endsection
@section('script')
<script>
    function preview_image(event)
    {
     var reader = new FileReader();
     reader.onload = function()
     {
      var output = document.getElementById('image');
      output.src = reader.result;
     }
     reader.readAsDataURL(event.target.files[0]);
    }

</script>
@endsection
