
@php
$setting = App\Models\Setting::with(['picture'])->where('id', 1)->firstOrFail();

@endphp
 <!-- Footer Section Begin -->
 <footer class="footer spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__about__logo">
                        {{--  <a href="./index.html"><img src="img/logo.png" alt=""></a>  --}}
                    </div>
                    <ul>
                        <li>Address: {{ $setting->address }}</li>
                        <li>Phone: {{ $setting->phone }}</li>
                        <li>Email:{{ $setting->supportemail }}</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                <div class="footer__widget">
                    <h6>Useful Links</h6>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">About Our Shop</a></li>
                        <li><a href="#">Secure Shopping</a></li>
                        <li><a href="#">Delivery infomation</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Our Sitemap</a></li>
                    </ul>
                    <ul>
                        <li><a href="#">Who We Are</a></li>
                        <li><a href="#">Our Services</a></li>
                        <li><a href="#">Projects</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Innovation</a></li>
                        <li><a href="#">Testimonials</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="footer__widget">
                    <h6>Join Our Newsletter Now</h6>
                    <p>Get E-mail updates about our latest shop and special offers.</p>
                    <form action="#">
                        <input type="text" placeholder="Enter your mail">
                        <button type="submit" class="site-btn">Subscribe</button>
                    </form>
                    <div class="footer__widget__social">
                        <a href="{{ $setting->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="{{ $setting->instagram }}" target="_blank"><i class="fa fa-instagram"></i></a>
                        <a href="{{ $setting->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a href="{{ $setting->linkedin }}" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer__copyright">
                    {{--  <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->  --}}
                        <strong>Copyright &copy; {{ date('Y')}} {{ ucwords($setting->company) }}</strong>
                        All rights reserved.
                        <div class="float-right d-none d-sm-inline-block">
                          <b>Designed By OLUOKUN KABIRU ADESINA
                        </div><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                    {{--  <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>  --}}
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Js Plugins -->
<script src="{{ asset('asset/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('asset/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

{{--  <script src="{{ asset('asset/js/jquery.nice-select.min.js') }}"></script>  --}}
<script src="{{ asset('asset/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('asset/plugins/select2/js/select2.full.min.js') }}"></script>

<script src="{{ asset('asset/js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('asset/js/mixitup.min.js') }}"></script>
<script src="{{ asset('asset/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('asset/js/main.js')}}"></script>
<script src="{{ asset('asset/plugins/summernote/summernote-bs4.min.js') }}"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAnS3dXsyLG_Ihtjs7_QUbh8b0mzMReP34&libraries=places&callback=initMap&q=Eiffel+Tower
+Paris+France" async defer></script>
{{--  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtCXlzGS3pcKccsTKdgt1zOYFKCd7fTdI&libraries=places&callback=initMap" async defer></script>  --}}
{{--  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdyIo7lzrFeK_hWM17Nj7PuK8gF46natk&libraries=places&callback=initialize" async defer></script>  --}}
{{--  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZib4Lvp0g1L8eskVBFJ0SEbnENB6cJ-g&callback=initialize"></script>  --}}
{{-- AIzaSyAnS3dXsyLG_Ihtjs7_QUbh8b0mzMReP34 --}}
<script src="{{asset('asset/js/ogajs.js')}}"></script>
{{-- <script src="{{asset('asset/js/mapinput.js')}}"></script> --}}

{{--  <script src="{{ asset('asset/js/mapInput.js') }}"></script>  --}}
{{--  <script src="{{ asset('asset/js/map.js') }}"></script>  --}}
@yield('script')
