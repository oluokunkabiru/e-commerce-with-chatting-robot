@extends('layout.mainlayout')
@section('title', 'Contact Us')
@section('content')
 <!-- Breadcrumb Section Begin -->
 <section class="breadcrumb-section set-bg" data-setbg="{{ asset('asset/img/breadcrumb.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Consultant </h2>
                    <div class="breadcrumb__option">
                        <a href="/">Home</a>
                        <span>Consultant </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Contact Section Begin -->
<section class="contact spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_phone"></span>
                    <h4>Phone</h4>
                    <p> {{ $setting->phone }} </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_pin_alt"></span>
                    <h4>Address</h4>
                    <p> {{ $setting->address }} </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_clock_alt"></span>
                    <h4>Open time</h4>
                    <p>8:00 am to 8:00 pm</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_mail_alt"></span>
                    <h4>Email</h4>
                    <p> {{ $setting->supportemail }} </p>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->
<!-- Contact Form Begin -->
<div class="contact-form spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact__form__title">
                    <h2>Consult Us now</h2>
                </div>
            </div>
        </div>
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong style="font-size:15px;">Success :{{session('success') }}</strong><br/>
        </div>
        @endif
        @if($errors->any())

        <div class="alert alert-danger alert-dismissible fade show">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong style="font-size:20px;">Oops!
               {{ "Kindly rectify below errors" }}</strong><br/>
          @foreach ($errors->all() as $error)
          {{$error }} <br/>
          @endforeach
        </div>
        @endif
        <form action="{{ route('contactus.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <label for="">Full name</label>
                    <input type="text" name="name" value="{{isset(Auth::user()->name)?Auth::user()->name:"", old('name') }}" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Your name">
                    @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
                </div>
                <div class="col-lg-6 col-md-6">
                    <label for="">Email address</label>
                    <input type="email" name="email" value="{{ isset(Auth::user()->email) ? Auth::user()->email :"", old('email') }}" placeholder="Your Email"  class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}">
                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                </div>

                <div class="col-lg-6 col-md-6">
                    <label for="">Contact phone number</label>
                    <input type="tel" name="phone" value="{{ isset(Auth::user()->phone) ? Auth::user()->phone :"", old('phone') }}" placeholder="Your Email"  class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}">
                    @if ($errors->has('phone'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                @endif
                </div>

                <div class="col-lg-6 col-md-6">
                    <input type="email" name="email" value="{{ isset(Auth::user()->email) ? Auth::user()->email :"", old('email') }}" placeholder="Your Email"  class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}">
                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                </div>
                <div class="col-md-12">
                    <label for="">Prefer service mode</label>
                    <br>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="customRadio" name="example" value="customEx">
                        <label class="custom-control-label" for="customRadio">Online</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="customRadio2" name="example" value="customEx">
                        <label class="custom-control-label" for="customRadio2">Farm Visitation</label>
                      </div>

                </div>

                <div class="col-md-6">
                    <label for="">Contact address</label>
                    <textarea placeholder="Full Address" name="address"  class="textare form-control {{ $errors->has('email') ? ' is-invalid' : '' }} " ></textarea>
                    @if ($errors->has('address'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('address') }}</strong>
                    </span>
                @endif
                </div>


                <div class="col-md-6">
                    <label for="">Other Information</label>
                    <textarea placeholder="Other information that you want us to know" name="other"  class="textare form-control {{ $errors->has('email') ? ' is-invalid' : '' }} " ></textarea>
                    @if ($errors->has('other'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('other') }}</strong>
                    </span>
                @endif
                </div>

                    <button type="submit" class="site-btn">CONSULT NOW</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Contact Form End -->
<!-- Map Begin -->
<div class="map">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d49116.39176087041!2d-86.41867791216099!3d39.69977417971648!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x886ca48c841038a1%3A0x70cfba96bf847f0!2sPlainfield%2C%20IN%2C%20USA!5e0!3m2!1sen!2sbd!4v1586106673811!5m2!1sen!2sbd"
        height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    <div class="map-inside">
        <i class="icon_pin"></i>
        <div class="inside-widget">
            <h4>Lagos, Nigeria</h4>
            <ul>
                <li>Phone: </li>
                <li>Add:</li>
            </ul>
        </div>
    </div>
</div>
<!-- Map End -->

<!-- Contact Form Begin -->
<div class="contact-form spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact__form__title">
                    <h2>Leave Message</h2>
                </div>
            </div>
        </div>
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong style="font-size:15px;">Success :{{session('success') }}</strong><br/>
        </div>
        @endif
        @if($errors->any())

        <div class="alert alert-danger alert-dismissible fade show">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong style="font-size:20px;">Oops!
               {{ "Kindly rectify below errors" }}</strong><br/>
          @foreach ($errors->all() as $error)
          {{$error }} <br/>
          @endforeach
        </div>
        @endif
        <form action="{{ route('contactus.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <input type="text" name="name" value="{{isset(Auth::user()->name)?Auth::user()->name:"", old('name') }}" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Your name">
                    @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
                </div>
                <div class="col-lg-6 col-md-6">
                    <input type="email" name="email" value="{{ isset(Auth::user()->email) ? Auth::user()->email :"", old('email') }}" placeholder="Your Email"  class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}">
                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                </div>
                <div class="col-lg-12 text-center">
                    <textarea placeholder="Your message" name="message"  class="textarea form-control {{ $errors->has('email') ? ' is-invalid' : '' }} " ></textarea>
                    @if ($errors->has('message'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('message') }}</strong>
                    </span>
                @endif
                    <button type="submit" class="site-btn">SEND MESSAGE</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Contact Form End -->

@endsection
@section('script')
<script>
    $(function () {
      // Summernote
      $('.textarea').summernote({
          height:150,
          toolbar:[
              ['style', ['style']],
              ['font', ['bold', 'italic', 'underline', 'clear']],
              ['color', ['color']],
              ['para', ['ul', 'ol', 'paragraph']],
              ['table', ['table']],
              ['insert', ['link', 'pictur']],
              ['view', ['fullscreen', 'codeview', 'help']]
          ]
      })
    })
  </script>
@endsection
