@extends('web.layouts.app')

@section('title', 'Main page')

@section('css')
@endsection

@section('content')
<div class="company-introduction">
        <div class="team-contain">
            <div class="introduction-top">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="introduction-title">公司介绍</div>
                        <div>
                             <img src="./img/introduce.png" class="introduction-img">
                        </div>
                        <div class="introduction-title">公司结构</div>
                        <div>
                             <img src="./img/structure.png" class="introduction-img">
                        </div>
                        <div class="introduction-brand">合作品牌及机构</div>
                        <div style="margin-bottom: 30px">
                             <img src="./img/brand.png" class="introduction-img">
                        </div>
                        <div>
                            <div id="map">
                                
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
<script type="text/javascript" src="http://webapi.amap.com/maps?v=1.4.6&key=b6f0744f2680a9728fc7fcc2244b0d48&plugin=AMap.Autocomplete"></script> 
<script>
    $('.nav-introduction').addClass('active');
    var map = new AMap.Map('map',{
            zoom:15,
        });
    marker = new AMap.Marker({
        position: new AMap.LngLat(113.941744,22.527855),
    });
    map.add(marker);
    map.setZoomAndCenter(18, [113.941744, 22.527855]);
</script>
@endsection
