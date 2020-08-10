@include('marketers.header')
@include('marketers.sidebar')
<body>
<div class="container-fluid">
   @yield('content')
</div>
<div class="container-fluid">
{{-- @yield('footer') --}}
@include('marketers.footer')
</div>
</body>
</html>
