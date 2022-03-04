@php
    $setting = App\Models\Setting::with(['picture'])->where('id', 1)->firstOrFail();
    $producting= App\Models\Product::get();
@endphp
<head>
    <meta charset="UTF-8">
    @yield('metadata')


    <title>{{ $setting->company }}::@yield('title')</title>

    <!-- Google Font -->

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/plugins/select2/css/select2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('asset/css/elegant-icons.css') }}" type="text/css">
    {{--  <link rel="stylesheet" href="{{ asset('asset/css/nice-select.css') }}" type="text/css">  --}}
    <link rel="stylesheet" href="{{ asset('asset/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/plugins/summernote/summernote-bs4.css') }}">
    <link rel="icon" href="{{ url($setting->picture->file) }}">
    @yield('style')
</head>
