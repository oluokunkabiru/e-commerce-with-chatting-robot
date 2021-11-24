<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<body>
    @include('includes.homeheader')
   @yield('content')
   @include('pages.chatting')

    @include('includes.footer')

</body>
</html>
