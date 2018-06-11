@extends('web.layouts.app')

@section('title', 'Main page')

@section('css')
@endsection

@section('content')
<div>
        <img src="./img/banner-2.png" class="product-img">
    </div>
    <div class="product-div">
        <div class="row">
            <div class="col-sm-12">
                <div class="col-sm-6" >
                    <img src="./img/xidouma.png" class="product-max-img"/>
                </div>
                <div class="col-sm-6" style="text-align: left">
                    <p class="seedo-code-p">喜豆码</p>
                    <p>SEEDO QR code</p>
                    <p>喜豆码将附着在零售类产品上,用户通过扫描,可免费参与平台提供的竞猜活动,有机会获得丰厚奖品。</p>
                    <p>喜豆码可在所有零售类产品上使用,目前以酒类产品优先,在酒类产品的流通使用中,能提高大概3-10%左右的销量。</p>
                    <p>喜豆码让商家和用户之间产生连接点,并持续维持。</p>
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
                        <div class="different-text">借鉴双色球的算法， 并和双色球的开奖数字保持一致， 在最大程度上保证平台中奖的公正性。</div>
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
                        <p class="seedo-code-p">奖品规则</p>
                        <p>基于不同传播主题</p>
                        <p>合作品牌将不断更新奖品及活动形式,让用户对平台</p>
                        <p>产生持续性关注于依赖。</p>
                    </div>
                    <div class="col-sm-6" >
                        <img src="./img/xidouma.png" class="product-max-img"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-div product-div-sha" style="padding-bottom: 50px">
        <p class="seedo-code-p">使用流程</p>
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
                <p><img src="./img/p_ad.png" class="product-max-img"></p>
            </div>
            <div class="slideBox shop" style="display: none;">
                <p class="product-div-ad-title"><img src="./img/p_shop_title.png" class="product-max-img"></p>
                <p><img src="./img/p_shop.png" class="product-max-img"></p>
            </div>
            <div class="slideBox user" style="display: none;">                
                <p class="product-div-ad-title"><img src="./img/p_user_title.png" class="product-max-img"></p>
                <p><img src="./img/p_user.png" class="product-max-img"></p>
            </div>
        </div>
    </div>
    <div class="product-div">
        <p class="seedo-code-p">产品愿景</p>
        <img src="./img/vision.png" class="product-max-img">
        <p class="vision-title">带动线下实体经济</p>
        <p >将传播、娱乐、奖励机制相结合，打造互动竞猜传播平台， 用互联网产品刺激线下消费，助力线下经济增长。</p>
        <p class="vision-title">资本市场进入</p>
        <p >与资本深层合作，主导小额高效投资，为商业伙伴带来创造更大价值。</p>
        <p class="vision-title">海购电商资源对接</p>
        <p >后期将接入海购电商资源， 融合直播、视频、货源追溯等功能点，提供优越体验的海购平台。</p>
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
</script>
@endsection
