@extends('web.layouts.app')

@section('title', 'Main page')

@section('css')
@endsection

@section('content')
<div>
        <img src="./img/banner-2.jpg" class="product-img">
    </div>
    <div class="product-div">
        <div class="row">
            <div class="col-sm-12">
                <div class="col-sm-6" >
                    <img src="./img/xidouma.png" class="product-max-img"/>
                </div>
                <div class="col-sm-6" style="text-align: left">
                    <p class="seedo-code-p">喜豆码</p>
                    <span class="seedo-code-p-text" style="line-height:32px">喜豆码是由喜豆平台推出的二维码，在不同的商业零售活动中，</span></br>
                    <span class="seedo-code-p-text" style="line-height:32px">以不同主题的”豆子”形象出现，满足不同的商业活动场景及品牌传播需求</span></br>
                    <span class="seedo-code-p-text" style="line-height:32px">用户通过扫描喜豆码，获得商家提供的即时优惠，免费参与平台提供的竞猜活动， 赢得丰厚奖品。</span></br>
                </div>
            </div>
        </div>
    </div>
    <div class="product-div product-div-sha product-difference">
        <div class="team-contain">
            <div class="row">
                    <p class="seedo-code-p">差异化属性</p>
                <div class="col-sm-12">
                    <div class="col-sm-4 difference-sm-4">
                        <div class="" style="text-align: center;">
                            <img src="./img/gongpin.png" class="product-max-img"/>
                        </div>
                        <div class="difference-label">公正性</div>
                        <div class="different-text">借鉴双色球的算法， 并和双色球的开奖数字保持一致， 保证平台中奖的公正性。</div>
                    </div>
                    <div class="col-sm-4 difference-sm-4">
                        <div class="" style="text-align: center;">
                            <img src="./img/fuwu.png" class="product-max-img"/>
                        </div>
                        <div class="difference-label">销售服务</div>
                        <div class="different-text">商家购买喜豆码，获得的是一整套营销服务及销售后台的使用权，在销售上获得真正有效的支持。</div>
                    </div>
                   <div class="col-sm-4 difference-sm-4">
                        <div class="" style="text-align: center;">
                            <img src="./img/anquan.png" class="product-max-img"/>
                        </div>
                        <div class="difference-label">数据安全性</div>
                        <div class="different-text">全球首家将区块链技术真正落地应用到移动传媒领域，让每一个用户信息， 每一条投放记录都能如实记录， 无法篡改，保证真实有效。</div>
                    </div>
                </div>
                <div class="sol-sm-12">
                    <div class="col-sm-4 difference-sm-4">
                        <div class="" style="text-align: center;">
                            <img src="./img/exposure.png" class="product-max-img"/>
                        </div>
                        <div class="difference-label">精准曝光</div>
                        <div class="different-text">按性别, 年龄, 婚姻状况, 接入位置, 通讯公司种类，点击次数，实际销售量等多样化维度产生标签， 让每一次曝光更高效精准。</div>
                    </div>
                    <div class="col-sm-4 difference-sm-4">
                        <div class="" style="text-align: center;">
                            <img src="./img/sales.png" class="product-max-img"/>
                        </div>
                        <div class="difference-label">销售量</div>
                        <div class="different-text">多样化维度产生标签， 让每一次曝光更高效精准。</div>
                    </div>
                    <div class="col-sm-4 difference-sm-4">
                        <div class="" style="text-align: center;">
                            <img src="./img/yangshi.png" class="product-max-img"/>
                        </div>
                        <div class="difference-label">样式多样</div>
                        <div class="different-text">动态广告, 平面广告, 网站链接, 问卷调查等多种投放形式， 解决更多针对性问题。</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-div ">
        <div class="team-contain">
           <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-6" style="text-align: left">
                        <p class="seedo-code-p" style="padding-top:40px">奖品规划</p>
                        <p class="seedo-code-p-text">懂你最想要的那一个，话题产品选择 + 自身品牌产品定制 基于传播主题、合作品牌、时下热点</p>
                        <p class="seedo-code-p-text">不断更新奖品及活动形式，且在奖品的选择上</p>
                        <p class="seedo-code-p-text">充分考虑话题性，让每一次奖品的输出都能成为一次传播</p>
                        <p class="seedo-code-p-text">让每一个让用户对平台产生持续性关注于依赖。</p>
                    </div>
                    <div class="col-sm-6" style="    padding: 44px 0;">
                        <img src="./img/prizes.png" class="product-max-img"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-div product-div-sha" style="padding-bottom: 50px">
        <p class="seedo-code-p">喜豆应用使用流程</p>
        <img src="./img/process.png" class="product-max-img">
    </div>
    <div class="product-div product-div-ad" style="">
        <div class="parHd clearfix">
            <ul>
                <li class="toggle" data-class="shop"><b></b>商家</li>  
                <li class="toggle par-active" data-class="ad"><b></b>广告商</li>  
                <li class="toggle" data-class="user"><b></b>用户</li>  
            </ul>
            <p class="product-line"></p>
        </div>
        <div class="parBd clearfix">
            <div class="slideBox ad">
                <p class="product-div-ad-title"><img src="./img/p_ad_title.png" class="product-max-img"></p>
                <p class="seedo-code-p-text"><img src="./img/p_ad.png" class="product-max-img"></p>
            </div>
            <div class="slideBox shop" style="display: none;">
                <p class="product-div-ad-title"><img src="./img/p_shop_title.png" class="product-max-img"></p>
                <p class="seedo-code-p-text"><img src="./img/p_shop.png" class="product-max-img"></p>
            </div>
            <div class="slideBox user" style="display: none;">                
                <p class="product-div-ad-title"><img src="./img/p_user_title.png" class="product-max-img"></p>
                <p class="seedo-code-p-text"><img src="./img/p_user.png" class="product-max-img"></p>
            </div>
        </div>
    </div>
    <div class="product-div">
        <p class="seedo-code-p" style="padding-bottom:15px">产品愿景</p>
        <p class="seedo-code-p" style="padding-top:0px">VISION</p>
        <img src="./img/vision.png" class="product-max-img">
        <div class="row" style="    padding: 30px 0;">
            <div class="col-sm-4"> 
                <p class="vision-header">01</p>
                <p class="vision-title">带动线下实体经济</p>
                <p class="seedo-code-p-text">带动线下实体经济将传播、娱乐、奖励机制相结合，打造互动竞猜传播平台， 用互联网产品刺激线下消费，实现真实销售增长。</p>
            </div>
            <div class="col-sm-4"> 
                <p class="vision-header">02</p>
                <p class="vision-title">资本市场进入</p>
                <p class="seedo-code-p-text">与资本深层合作，为销售合伙人带来稳定投资回报。</p>
                
            </div>
            <div class="col-sm-4"> 
                <p class="vision-header">03</p>
                <p class="vision-title">海购电商资源对接</p>
                <p class="seedo-code-p-text">后期将接入海购电商资源， 融合直播、视频、货源追溯等功能点，提供优越体验的海购平台。</p>
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
    $('.nav-product').addClass('active');
    $('.toggle').click(function(){
        $('.toggle').removeClass('par-active');
        $(this).addClass('par-active');
        $('.slideBox').hide();
        $('.'+$(this).data('class')).show();
    })
</script>
@endsection
