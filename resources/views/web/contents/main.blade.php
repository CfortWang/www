@extends('web.layouts.app')

@section('title', 'Main page')

@section('css')
@endsection

@section('content')
<div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide swiper-div">
                <img class="swiper-img-index" src="./img/banner-1.png">
            </div>
            <div class="swiper-slide swiper-div">
                <img class="swiper-img-index" src="./img/banner-2.png">
            </div>
            <div class="swiper-slide swiper-div">
                <img class="swiper-img-index" src="./img/banner-3.png">
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
    <div class="company">
        <div class="company-1">公司介绍</div>
        <div class="company-2">SEEDO是一个善于利用创新思维来创造新鲜事物的年轻团队</div>
    </div>
    <div class="team">
        <div class="team-contain">
            <div class="row">
                <div class="col-sm-12">
                    <div class="team-text">团队介绍</div>
                    <div class="col-sm-4">
                        <div class="team-text2">
                            <img src="./img/6.png" class="team-img" />
                            <div class="team-text2-1">
                                <span class="team-text2-2">金煊政</span>
                                <span>创始人兼首席执行官</span>
                            </div>
                            <div class="team-text2-3">
                                喜豆APP案件力度嘎多思考国家队爱的时光记录卡进度噶速度了更加阿萨德了噶几点过来看噶价格拉卡接收到国家的设计工具按国家圣诞快乐国家撒大哥阿嘎都是
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="team-text2">
                            <img src="./img/6.png" class="team-img" />
                            <div class="team-text2-1">
                                <span class="team-text2-2">金煊政</span>
                                <span>创始人兼首席执行官</span>
                            </div>
                            <div class="team-text2-3">
                                喜豆APP案件力度嘎多思考国家队爱的时光记录卡进度噶速度了更加阿萨德了噶几点过来看噶价格拉卡接收到国家的设计工具按国家圣诞快乐国家撒大哥阿嘎都是
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="team-text2">
                            <img src="./img/6.png" class="team-img" />
                            <div class="team-text2-1">
                                <span class="team-text2-2">金煊政</span>
                                <span>创始人兼首席执行官</span>
                            </div>
                            <div class="team-text2-3">
                                喜豆APP案件力度嘎多思考国家队爱的时光记录卡进度噶速度了更加阿萨德了噶几点过来看噶价格拉卡接收到国家的设计工具按国家圣诞快乐国家撒大哥阿嘎都是
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    $('.nav-index').addClass('active');
</script>
@endsection
