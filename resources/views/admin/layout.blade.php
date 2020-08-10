@include('admin.header')
@include('admin.sidebar')
<body>
<div class="container-fluid">
   @yield('content')
</div>
<div class="container-fluid">
{{-- @yield('footer') --}}
@include('admin.footer')
</div>
</body>
</html>
