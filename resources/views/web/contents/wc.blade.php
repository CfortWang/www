<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>世界杯，喜豆一下</title>
    <link rel="icon" href="/img/seedo.ico" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name=”keywords” content="喜豆，Bean POP，喜豆Bean POP,SEEDO，喜豆文化发展有限公司官网，喜豆文化发展有限公司，喜豆文化，互动营销平台，广告，营销，传播。" />
    <meta name=”description” content="喜豆是一家运用区块链技术的互动竞猜营销平台，用全新的运营理念和营销思维，专注于服务消费品牌及零售业客户，为品牌及零售业客户带来二次销售及连带销售，建立线上获利+线下消费的生态，刺激线上消费、助力线下实体经济。通过构筑销售合伙人模式，将互联网产品思维与传统零售优势相结合，为商家和品牌创造价值。" />
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/wc.css">
    <link rel="stylesheet" type="text/css" href="./css/bootstrapValidator.css" />
    <script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
</head>

<body>
<style>
.form-horizontal .form-group {
    margin-right: auto;
    margin-left: auto;
}
</style>
    <!-- Wrapper-->
    <img src="./img/wc/theme.jpg" style="width:0px;height:0px">
    <div class="page">
        <div id="wrapper">
            <div id="page-wrapper" class="gray-bg">
                <nav class="navbar seedo-nav navbar-default" role="navigation">
                    <div class="container-fluid">
                        <div class="navbar">
                            <div>
                                <div>
                                    <span class="nav-span">世界杯竞猜</span>
                                    <span class="nav-right"><img src="./img/wc/icon.png" style="width: 20px;">奖品&玩法</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="back-contain">
            <div class="back-div-img">
                <img src="./img/wc/theme.jpg" style="width:100%">
            </div>
            <div class="back-div-title">
                <div class="back-div-title-time">
                    2018年{{date('m')}}月{{date('d')}}日 赛程竞猜
                </div>
                <div class="back-div-title-people">
                    本次竞猜人数：<span class="back-dev">{{$sum}}</span>人
                </div>
            </div>
            <div class="back-div-line"></div>
            <div class="back-div-form">
                <form id="back" class="form-horizontal">
                <div class="row">
                    @if (count($data) === 0)
                        <div class="empty">
                            当前没有竞猜
                        </div>
                    @else
                        @foreach ($data as $dat)
                        <div class="back-div-from-p">
                            <div class="back-div-from-div back-div-from-div-left">
                                <div>
                                    <div class="back-div-pic-div">
                                        <img class="back-pic" src="./img/wc/{{ $dat->home_team_image_file_name }}">
                                    </div>
                                    <div class="back-div-country-div">
                                        <span class="back-div-country-span">{{ $dat->home_team_name }}</span>
                                    </div>
                                </div>
                                <div class="back-div-from-select-div">
                                    <select name="home[{{$dat->seq}}]" class="form-control select-field"> 
                                        <option value="0">
                                        0球 
                                        </option>
                                        <option value="1">
                                        1球 
                                        </option>
                                        <option value="2">
                                        2球 
                                        </option>
                                        <option value="3">
                                        3球 
                                        </option>
                                        <option value="4">
                                        4球 
                                        </option>
                                        <option value="5">
                                        5球 
                                        </option>
                                        <option value="6">
                                        6球 
                                        </option>
                                        <option value="7">
                                        7球 
                                        </option>
                                        <option value="8">
                                        8球 
                                        </option>
                                        <option value="9">
                                        8个以上 
                                        </option>
                                    </select>
                                    <span></span>
                                </div>
                            </div>
                            <div class="back-div-from-div back-div-from-div-middle">
                                <div class="middle-circle-p">
                                    <div class="middle-circle">vs</div>
                                </div>
                            </div>
                            <div class="back-div-from-div back-div-from-div-right">
                                <div>
                                    <div class="back-div-pic-div">
                                        <img class="back-pic" src="./img/wc/{{ $dat->away_team_image_file_name }}">
                                    </div>
                                    <div class="back-div-country-div">
                                        <span >{{ $dat->away_team_name }}</span>
                                    </div>
                                </div>
                                <div class="back-div-from-select-div">
                                    <select name="away[{{$dat->seq}}]" class="form-control select-field">
                                        <option value="0">
                                        0球 
                                        </option>
                                        <option value="1">
                                        1球 
                                        </option>
                                        <option value="2">
                                        2球 
                                        </option>
                                        <option value="3">
                                        3球 
                                        </option>
                                        <option value="4">
                                        4球 
                                        </option>
                                        <option value="5">
                                        5球 
                                        </option>
                                        <option value="6">
                                        6球 
                                        </option>
                                        <option value="7">
                                        7球 
                                        </option>
                                        <option value="8">
                                        8球 
                                        </option>
                                        <option value="9">
                                        8个以上 
                                        </option>
                                    </select>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                    <div class=" form-group back-div-from-input-div  for-hidden">
                        <input name="name" id="name" class="ipt form-control" placeholder="请输入姓名" />
                    </div>
                    <div class="form-group back-div-from-input-div  for-hidden">
                        <input name="phone_num" id="phone_num" class="ipt form-control" placeholder="手机号码是唯一的领奖方式，请填写准确" />
                    </div>
                    <div class="alert alert-danger" style="display:none;text-align:center">成功！很好地完成了提交。</div>
                    <div class="back-div-from-input-div for-hidden">
                        <button type="button" class="btn back-btn form-control">提交</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div id="ruler">
        <div class="ruler-img">
            <img src="./img/wc/top.png" height="150px">
        </div>
        <div class="ruler-middle">
            <div class="ruler-middle-title">
                奖品&玩法
                <div class="ruler-hide">
                    <img src="./img/wc/close.svg">
                </div>
            </div>
            <p style="padding-top: 50px"> 1.	<span style="color:#F7B42B">人人有份，三万元支付宝现金红包随机发</span>！只要加入竞猜，提交信息成功后，<span style="color:#F7B42B">即可瓜分以下对应现金，参与人数越多，奖金越大</span>，名单公布后一个工作日内到账，填写的手机号默认为支付宝账号。</p>
            <p style="color:#F7B42B">例如：竞猜人数满100，发600元红包；人数满12800，发3万元红包</p>
            <p>
                <img src="./img/wc/dd.png" style="max-width:100%">
            </p>
            <p>2.	参与竞猜，立得500喜豆点=5元现金，APP内兑现。</p>
            <p>3.	竞猜得奖，猜中一场比分得5元话费券，依次累积，三个工作日内到账。</p>
            <p>4.	点球大战进球数不计入整场比分。</p>
            <p style="padding-bottom: 30px">5.	比赛结束次日上午12点公布开奖详情，请务必关注公众号 【喜豆BeanPOP】。</p>
            
        </div>
    </div>
    <div id="fin">
        <div class="fin-top">
            <img src="./img/wc/top.svg" height="150px">
        </div>
        <div class="fin-middle">
            <p>邀请好友来竞猜，拿更多红包</p>
            <p >
                <img src="./img/qrwechat.jpg" style="max-width:140px">
            </p>
            <p style="font-size:14px">识别二维码 关注公众号 了解开奖详情</p>
        </div>
        <div class="fin-bottom">
            <a href="javascript:;" class="fin-btn">确定</a>
        </div>
    </div>
    <div id="error">
        <div class="fin-top">
            <img src="./img/wc/top.svg" height="150px">
        </div>
        <div class="fin-middle">
            <p>您的账号今日已经参与竞猜,无法再次提交</p>
        </div>
        <div class="fin-bottom">
            <a href="worldcupresult" >查看竞猜记录</a>
        </div>
    </div>
</body>
<script src="./js/bootstrapValidator.min.js"></script>
<script src="./js/jweixin-1.2.0.js"></script>
<script>
    $('#back').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                name: {
                    validators: {
                        notEmpty: {
                            message: '姓名不能为空'
                        },
                        stringLength: {
                            min: 2,
                            max: 30,
                            message: '请输入姓名'
                        },
                    }
                },
                phone_num: {
                    validators: {
                        notEmpty: {
                         message: '手机号码不能为空'
                        },
                        stringLength: {
                            min: 11,
                            max: 11,
                            message: '请输入11位手机号码'
                        },
                        regexp: {
                            regexp: /^1[3|4|5|7|8]\d{1}\d{4}\d{4}$/,
                            message: '请输入正确的手机号码'
                        }
                    }
                },
            }
        });
    $('.nav-right').click(function(){
        $('#ruler').show();
        // $('.page').addClass('div-hidden');
    })
    $('.ruler-hide').click(function(){
        $('#ruler').hide();
    })
    $('.back-btn').click(function(){
        $('.alert-danger').hide();
        if($('#back').data('bootstrapValidator').isValid()){
            var data = $('form').serialize();
            $('.back-btn').attr('disabled',true);
            $.ajax({
                url: '/api/worldcup',
                dataType: 'json',
                type: 'POST',
                data:data,
                success: function(response){
                    $('#fin').show();
                    $('.for-hidden').hide();
                    $('.select-field').hide();
                    $('.back-dev').html(parseInt($('.back-dev').html())+1);
                    $('.select-field').each(function () { 
                        $(this).next().html($(this).val());
                    });
                },
                error: function(e,response) {
                    var msg  = '未知错误';
                    if(typeof(jQuery.parseJSON(e.responseText).message)=='string'){
                        msg = jQuery.parseJSON(e.responseText).message;
                        if(msg=='您已经提交过'){
                        $('#error').show();
                        }
                    }
                    $('.alert-danger').text(msg);
                    $('.alert-danger').show();
                    $('.back-btn').attr('disabled',false);
                }
            });
        } else{
            $('#back').data('bootstrapValidator').validate();
        }
    })
    $('.fin-btn').click(function(){
        $('#fin').hide();
    })
    $('.error-btn').click(function(){
        $('#error').hide();
    })
    wx.config({
        debug: true, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
        appId: "{{$appId}}", // 必填，公众号的唯一标识
        timestamp: "{{$timestamp}}", // 必填，生成签名的时间戳
        nonceStr: "{{$nonceStr}}", // 必填，生成签名的随机串
        signature: "{{$signature}}",// 必填，签名
        jsApiList: ['onMenuShareTimeline','onMenuShareAppMessage','onMenuShareQQ','onMenuShareWeibo','onMenuShareQZone'] // 必填，需要使用的JS接口列表
    });
    wx.ready(function(){
        console.log('12');
    });
    var we_title = '你来！这里有七万现金等着送出去！';
    var we_desc = '世界杯竞猜再升级，猜对猜错都有奖，再也不用去天台了…';
    var we_img = 'http://www.beanpop.cn/img/seedo.png';
    wx.onMenuShareTimeline({
        title: we_title, // 分享标题
        link: '', // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
        imgUrl: we_img, // 分享图标
        success: function () {
        // 用户点击了分享后执行的回调函数
    };
    wx.onMenuShareAppMessage({
        title: we_title, // 分享标题
        desc: we_desc, // 分享描述
        link: '', // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
        imgUrl: we_img, // 分享图标
        type: '', // 分享类型,music、video或link，不填默认为link
        dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
        success: function () {
        // 用户点击了分享后执行的回调函数
        }
    });
    wx.onMenuShareQQ({
        title: we_title, // 分享标题
        desc: we_desc, // 分享描述
        link: '', // 分享链接
        imgUrl: we_img, // 分享图标
        success: function () {
        // 用户确认分享后执行的回调函数
        },
        cancel: function () {
        // 用户取消分享后执行的回调函数
        }
    });
    wx.onMenuShareWeibo({
        title: we_title, // 分享标题
        desc: we_desc, // 分享描述
        link: '', // 分享链接
        imgUrl: we_img, // 分享图标
        success: function () {
        // 用户确认分享后执行的回调函数
        },
        cancel: function () {
        // 用户取消分享后执行的回调函数
        }
    });
    wx.onMenuShareQZone({
        title: we_title, // 分享标题
        desc: we_desc, // 分享描述
        link: '', // 分享链接
        imgUrl: we_img, // 分享图标
        success: function () {
        // 用户确认分享后执行的回调函数
        },
        cancel: function () {
        // 用户取消分享后执行的回调函数
        }
    });
</script>
</html>