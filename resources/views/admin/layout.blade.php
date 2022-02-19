
<!DOCTYPE html>
<html lang="en">
@include('admin.head')
<body class="hold-transition sidebar-mini layout-fixed">
{{-- style="height: auto; min-height: 100%;"> --}}
    <div class="wrapper">
        @include('admin.header')
        @include('admin.sidebar')
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>
        </div>
        @include('admin.footer')


    </div>

@yield('script')
</body>

</html>


