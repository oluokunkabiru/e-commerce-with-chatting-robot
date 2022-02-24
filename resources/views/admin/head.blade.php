@php
        $setting = App\Models\Setting::with(['picture'])->where('id', 1)->firstOrFail();

@endphp
<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>{{ $setting->company }}::@yield('title')</title>

<!-- Google Font -->
<link rel="stylesheet" href="{{ asset('asset/plugins/fontawesome-free/css/all.min.css')}}">

<link rel="stylesheet" href="{{asset('asset/plugins/dist/css/adminlte.min.css') }}">
<link rel="stylesheet" href="{{ asset('asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
<link rel="stylesheet" href="{{ asset('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
<link rel="icon" href="{{ url($setting->picture->file) }}">
<link rel="stylesheet" href="{{ asset('asset/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('asset/plugins/summernote/summernote-bs4.css') }}">

