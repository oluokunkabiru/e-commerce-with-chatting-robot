
<!DOCTYPE html>
<html lang="en">
@include('marketer.head')
<body class="hold-transition sidebar-mini layout-fixed">
{{-- style="height: auto; min-height: 100%;"> --}}
    <div class="wrapper">
        @include('marketer.header')
        @include('marketer.sidebar')
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>
        </div>
        @include('marketer.footer')

    </div>


</body>

</html>


