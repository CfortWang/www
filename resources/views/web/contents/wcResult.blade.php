<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>竞猜记录</title>
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
    <div class="page">
        <div id="wrapper">
            <div id="page-wrapper" class="gray-bg">
                <nav class="navbar seedo-nav navbar-default" role="navigation">
                    <div class="container-fluid">
                        <div class="navbar">
                            <div>
                                <div>
                                    <span class="nav-span">竞猜记录</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="back-contain">
        @foreach ($data as $dat)
            <div class="result-day-contain">
                <div class="result-time">
                    投注时间：{{$dat['time']}}
                </div>
                @foreach ($dat['data'] as $da)
                    <div class="result-div @if ($da->status=='complete')
                    result-done
                        @endif
                        @if ($da->home_team_score === $da->fin_home_score&&$da->away_team_score === $da->fin_away_score)
                    result-success
                        @endif" >
                        <div class="result-div-normal result-div-left">
                            <img src="./img/wc/{{$da->home_team_image_file_name}}" class="result-img"> 
                            <span>{{$da->home_team_name}}</span> 
                        </div>
                        <div class="result-div-normal result-div-middle">
                            <span>VS</span>
                        </div>
                        <div class="result-div-normal result-div-right">
                            <img src="./img/wc/{{$da->away_team_image_file_name}}" class="result-img"> 
                            <span>{{$da->away_team_name}}</span>
                        </div>
                        <div class="result-div-normal result-div-right-1 result-div-right-success">
                            <span>投注比分{{$da->home_team_score}}：{{$da->away_team_score}}</span>
                        </div>
                        @if ($da->home_team_score === $da->fin_home_score&&$da->away_team_score === $da->fin_away_score)
                        <div class="result-div-normal ">
                            <span class="result-div-success-span">猜中了</span>
                        </div>
                        @endif
                    </div>
                @endforeach
                
            </div>
            <div class="back-div-line"></div>
        @endforeach
            
    </div>
</body>
</html>