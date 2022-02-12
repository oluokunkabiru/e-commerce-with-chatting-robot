@extends('layout.mainlayout')
@section('title', 'User register')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-white">
                        <h3 class="text-center font-weight-bold">{{ __('Register') }}</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row ">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                        <div class="col-md-8">
                                            <input id="name" type="text"
                                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                                value="{{ old('name') }}" required autocomplete="name" autofocus>

                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="email"
                                            class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                        <div class="col-md-8">
                                            <input id="email" type="email"
                                                class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                                value="{{ old('email') }}" required autocomplete="email">

                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="phone"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                                        <div class="col-md-8">
                                            <input id="tel" type="tel"
                                                class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone"
                                                value="{{ old('tel') }}" autocomplete="tel">

                                            @if ($errors->has('phone'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="address"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                                        <div class="col-md-8">
                                            <textarea class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                                                name="address" placeholder="Address">
                                            </textarea>

                                            @if ($errors->has('address'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('address') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="city"
                                            class="col-md-4 col-form-label text-md-right">{{ __('City/Town') }}</label>

                                        <div class="col-md-8">
                                            <input id="city" type="text"
                                                class="form-control {{ $errors->has('city') ? ' is-invalid' : '' }}" name="city"
                                                value="{{ old('city') }}" autocomplete="city" autofocus>

                                            @if ($errors->has('city'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('city') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="state"
                                            class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>

                                        <div class="col-md-8">
                                            <input id="state" type="text"
                                                class="form-control {{ $errors->has('state') ? ' is-invalid' : '' }}"
                                                name="state" value="{{ old('state') }}" autocomplete="name" autofocus>

                                            @if ($errors->has('state'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('state') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="country"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                                        <div class="col-md-8">
                                            <input id="country" type="text"
                                                class="form-control {{ $errors->has('country') ? ' is-invalid' : '' }}"
                                                name="country" value="{{ old('country') }}" autocomplete="zipcode" autofocus>

                                            @if ($errors->has('country'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('country') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="zip"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Zipcode') }}</label>

                                        <div class="col-md-8">
                                            <input id="zipcode" type="number" maxlength="6" minlength="3"
                                                class="form-control {{ $errors->has('zipcode') ? ' is-invalid' : '' }}"
                                                name="zipcode" value="{{ old('zipcode') }}" autocomplete="zipcode" autofocus>

                                            @if ($errors->has('zipcode'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('zipcode') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="password"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                        <div class="col-md-8">
                                            <input id="password" type="password"
                                                class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                name="password" required autocomplete="new-password">

                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="password-confirm"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                        <div class="col-md-8">
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>
                                </div>

                            </div>















                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary btn-block btn-lg">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <form>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <a href="/login/facebook" class="text-primary"><span
                                                class="badge badge-primary p-2 mr-2 "><span class="fa fa-facebook "
                                                    style="font-size: 20px"></span></span>Login With Facebook</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <a href="/login/google" class="text-primary"><span
                                                class="badge badge-primary p-2 mr-2 "><span class="fa fa-google"
                                                    style="font-size: 20px"></span></span>Login With Gmail</a>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <a href="facebook" class="text-primary"><span
                                                class="badge badge-primary p-2 mr-2 "><span class="fa fa-twitter"
                                                    style="font-size: 20px"></span></span>Login With Twitter</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
