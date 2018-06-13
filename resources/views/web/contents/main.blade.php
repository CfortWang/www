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
        <div class="company-2">
            <p>喜豆是全球第一家运用区块链技术的互动竞猜传播平台，</p>
            <p>用全新的运营理念和思维，分析用户行为，专注于服务消费品牌及零售业客户，</p>
            <p>建立线上获利+线下消费的生态，刺激线上消费、助力线下实体经济。</p>
            <p>通过构筑销售合伙人模式，将互联网产品思维与传统零售优势相结合，为商家和品牌创造价值。</p>
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
        autoplay:true,
        pagination: {
            el: '.swiper-pagination',
            dynamicBullets: true,
            clickable: true,
        },
        paginationClickable: true,
        centeredSlides: true,
        loop : true,
        // autoplayDisableOnInteraction: false,
    });
    $('.nav-index').addClass('active');
</script>
@endsection
