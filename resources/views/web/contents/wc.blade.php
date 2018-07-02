<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>竞猜</title>
    <link rel="icon" href="/img/seedo.ico" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name=”keywords” content="喜豆，Bean POP，喜豆Bean POP,SEEDO，喜豆文化发展有限公司官网，喜豆文化发展有限公司，喜豆文化，互动营销平台，广告，营销，传播。" />
    <meta name=”description” content="喜豆是一家运用区块链技术的互动竞猜营销平台，用全新的运营理念和营销思维，专注于服务消费品牌及零售业客户，为品牌及零售业客户带来二次销售及连带销售，建立线上获利+线下消费的生态，刺激线上消费、助力线下实体经济。通过构筑销售合伙人模式，将互联网产品思维与传统零售优势相结合，为商家和品牌创造价值。" />
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/wc.css">
    <script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <!-- Wrapper-->
    <img src="./img/wc/theme.jpg" style="display:none">
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
                <form id="back">
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
                    <div class="back-div-from-input-div for-hidden">
                        <input name="name" id="name" class="ipt form-control" placeholder="请输入姓名" />
                    </div>
                    <div class="back-div-from-input-div for-hidden">
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
            <p style="padding-top: 50px"> 1.	选择每支球队的进球数，猜中比分结果，</p>
            <p>根据体彩中心赔率前往喜豆APP兑换喜豆点</p>
            <p>（在喜豆APP里可以提现），</p>
            <p>（基数1倍默认等于<span style="color:red"><b>100</b></span>喜豆点，例如赔率1:7，猜中比分将获得700喜豆点，）</p>
            <p>2.	注册成为喜豆会员，获得<span style="color:red"><b>500</b></span>喜豆点</p>
            <p>（喜豆点在喜豆APP内可直接<span style="color:red"><b>提现，100喜豆点=1 RMB</b></span>）</p>
            <p>3.	在每日竞猜正确的用户中，抽取一人获得劲爆大奖</p>
            <p>奖品根据当期参与人数设定</p>
            <p></p>
            <li>1万人以上，<span style="color:red"><b>华为MATE RS</b></span></li>
            <li>5000-1万人，<span style="color:red"><b>iPhone 8</b></span></li>
            <li>2000-5000人，<span style="color:red"><b>iPad 2018款</b></span></li>
            <li>2000-1000人，<span style="color:red"><b>DW手表</b></span></li>
            <li>1000人以下，<span style="color:red"><b>小米AI音箱</b></span></li>
            <p>4.	每个手机号每期只能参与一次竞猜</p>
            <p style="padding-bottom: 30px">5.	每个比赛日结束后早10:30公布上期获奖用户</p>
        </div>
    </div>
    <div id="fin">
        <div class="fin-top">
            <img src="./img/wc/top.svg" height="150px">
        </div>
        <div class="fin-middle">
            <p>竞猜已完成</p>
            <p>转发邀请更多好友参与，奖品更丰厚</p>
            <p>万元大奖等你来升级！</p>
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
<script>
    $('.nav-right').click(function(){
        $('#ruler').show();
        // $('.page').addClass('div-hidden');
    })
    $('.ruler-hide').click(function(){
        $('#ruler').hide();
    })
    $('.back-btn').click(function(){
        $('.alert-danger').hide();
        var name = $('#name').val();
        var phone_num = $('#phone_num').val();
        if(!name){
            $('.alert-danger').text('请输入姓名');
            $('.alert-danger').show();
            return false;
        }
        if(!phone_num){
            $('.alert-danger').text('请输入手机号');
            $('.alert-danger').show();
            return false;
        }
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
    })
    $('.fin-btn').click(function(){
        $('#fin').hide();
    })
    $('.error-btn').click(function(){
        $('#error').hide();
    })
</script>
</html>