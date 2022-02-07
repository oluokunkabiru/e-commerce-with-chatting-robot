<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<style>
    .capdata{
    background-image: linear-gradient(rgba(127, 173, 57,0.3), rgba(127, 173, 57, 0.467));
    background-size: 100%;
    /* color: white; */
    /* height: 200px; */
    object-fit: cover;
}
.capdata h2{
    font-size: 60px;
    /* color: white; */

}
.carousel-item img{
    width: 100%;
    height: 500px;
}
@media screen and (max-width:768px){
    .capdata h2{
        font-size: 6px;
    }
    .capdata h4{
        font-size: 20px;
    }
}
</style>
<body>
    @include('includes.homeheader')
   @yield('content')
   {{--  @include('pages.chatting')  --}}

    @include('includes.footer')

</body>
</html>
