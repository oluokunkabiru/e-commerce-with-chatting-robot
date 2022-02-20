<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<body>
    @include('includes.header')
   @yield('content')
   @include('pages.chatting')

    @include('includes.footer')
    @yield('script')
</body>
</html>
