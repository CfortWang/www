@extends('web.layouts.app')

@section('title', 'Main page')

@section('css')
@endsection

@section('content')
<div class="career">
    <img src="./img/planbanner.png" class="career-img">
    <img src="./img/teampeople.png" class="career-max-img">
    <img src="./img/planteam.png" class="career-img" >
    <img src="./img/Join.png" class="career-max-img" style="margin-top: 30px">
</div>  
<div id="right-nav">
    <div class="w">
        <ul id="right-nav-list1">
            <li><a class="normal-number"><img src="./img/phone.png" style="width: 40px;height: 40px;margin: 10px;"></a>
                <div style="font-size: 14px;color:white;">0755-83830566</div>
            </li>
            <li><a id="up" style="display: none"><img src="./img/backtop.png" style="width: 40px;height: 40px;margin: 10px;"></a></li>
        </ul>
    </div>
    <div class="w">
        <div class="join-pic-div">
            <a href="join.html"><img src="./img/join-icon.png" class="join-pic-img" style="margin-top: -240px;width: 100%;height: auto;"></a>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    var mySwiper = new Swiper('.swiper-container', {
        autoplay: true, //等同于以下设置
        pagination: {
            el: '.swiper-pagination',
            dynamicBullets: true,
            clickable: true,
        },
        /*autoplay: {
          delay: 3000,
          stopOnLastSlide: false,
          disableOnInteraction: true,
          },*/
    });
    $('.nav-career').addClass('active');
</script>
@endsection