<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        html {
            font-size: 62.5%;
        }

        body {
            letter-spacing: 1px;
        }

        .nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #ffcb00;
            height: 1rem;
            padding: 0 0.15rem;
        }

        .nav img {
            width: 0.25rem;
        }

        img {
            width: 100%
        }

        .con {
            color: #000000;
            margin: 0 0.2rem;
        }

        .rule h4 {
            text-align: center;
        }

        .one {
            color: #EE6807;
            font-family: PingFangSC-Semibold;
        }

        h4 {
            font-size: 0.3rem;
            margin: 0.05rem 0;
        }

        h6 {
            margin: 0;
        }

        p,
        span,
        h6,
        div {
            font-size: 0.25rem;
        }

        .rule p,
        .nav h3 {
            font-family: PingFangSC-Regular;
            color: #1e1e1e;
        }

        .rule,
        .prize,
        time {
            margin: 0.3rem 0;
        }

        .rule,
        .title {
            color: #1e1e1e;
        }

        .title,
        .one {
            font-family: PingFangSC-Medium;
        }

        .but button {
            width: 100%;
            display: inline-block;
            text-align: center;
            background-color: #ffcb00;
            padding: 0.1rem;
            color: white;
            margin: 0.2rem 0;
            text-decoration: none;
            border: 1px;
            border-radius: 4px;
        }

        .prize-block {
            margin: 0.05rem 0;
        }

        .Grade {
            margin-right: 0.15rem;
            width: 1rem;
            display: inline-block;
            float: left;
        }

        .reward {
            clear: left;
        }

        .other {
            height: 0.1rem;
        }

        .prize-text {
            font-family: PingFangSC-Light;
        }

        .winningRules .prize-block,
        .time div {
            color: #4a4a4a;
        }

        .period .prize-block {
            color: #000000;
        }
    </style>
    <div>
        <!-- <div class="nav">
            <img src="./img/nav_return.png" alt="">
            <h3>喜豆</h3>
            <div></div>
        </div> -->
        <div>
            <img src="./img/event.png" alt="" class="">
        </div>
        <div class="con">
            <div class="rule">
                <h4 class="title">喜豆竞猜有奖</h4>
                <p>炎炎夏日，喜豆热度再升级，万元好礼送送送。拿起手机，扫一扫商品上的喜豆码，或使用喜豆券进入竞猜投注，挑选6颗黄豆和1颗绿豆，提交这串属于你的幸运号码，接下来只需要静静等待开奖就可以咯!喜豆竞猜共设置六个奖项，参照当期双色球开奖号码进行中奖匹配，保证结果的公正性。</p>
            </div>
            <div class="prize period">
                <h4 class="title"> 本期奖品</h4>
                <div class="prize-text">
                    <div class="prize-block one">
                        <span class="Grade">一等奖 </span>
                        <span class="reward"> 30000现金大奖</span>
                    </div>
                    <div class="prize-block">
                        <span class="Grade">二等奖 </span>
                        <span class="reward"> HUAWEI MATE PS</span>
                    </div>
                    <div class="prize-block">
                        <span class="Grade">三等奖 </span>
                        <span class="reward">Apple iPad 2018</span>
                    </div>
                    <div class="prize-block">
                        <span class="Grade">四等奖 </span>
                        <span class="reward"> DanielWellington手表</span>
                    </div>
                    <div class="prize-block">
                        <span class="Grade">五等奖 </span>
                        <span class="reward">小米移动电源</span>
                    </div>
                    <div class="prize-block">
                        <span class="Grade">六等奖 </span>
                        <span class="reward"> 2元话费 </span>
                    </div>
                </div>
            </div>
            <div class="prize winningRules">
                <h4 class="title">中奖规则</h4>
                <h6 class="one">挑选6颗黄豆与1颗绿豆作为你的竞猜号码</h6>
                <div class="prize-text">
                    <div class="prize-block">
                        <span class="Grade">一等奖: </span>
                        <span class="reward"> 6颗黄豆完全匹配</span>
                    </div>
                    <div class="prize-block">
                        <span class="Grade">二等奖: </span>
                        <span class="reward"> 5颗黄豆+1颗绿豆匹配 </span>
                    </div>
                    <div class="prize-block">
                        <span class="Grade">三等奖: </span>
                        <span class="reward">4颗黄豆+1颗绿豆匹配或者5颗黄豆匹配</span>
                    </div>
                    <div class="prize-block">
                        <span class="Grade">四等奖: </span>
                        <span class="reward"> 3颗黄豆+1颗绿豆匹配或者4颗黄豆匹配</span>
                    </div>
                    <div class="prize-block">
                        <span class="Grade">五等奖: </span>
                        <span class="reward">与绿豆的数字相匹配</span>
                    </div>
                    <div class="prize-block">
                        <span class="Grade">六等奖: </span>
                        <span class="reward"> 与绿豆前后的数字相匹配 </span>
                    </div>
                    <div class="prize-block">
                        <span class="Grade other"></span>
                        <span class="reward"> (比如绿豆是4，则选3号或5号中奖)</span>
                    </div>
                </div>
            </div>
            <div class="time">
                <h4 class="title"> 开奖时间</h4>
                <div>每周二、四、日晚上9点15分，喜豆准时开奖 </div>
            </div>
            <div class="but">
                <button href="#" class="">立即参与</button>
            </div>
        </div>
    </div>
    <script>
    ! function () {
        var htmlEl = document.getElementsByTagName('html')[0];
        var fitPage = function () {
            /* The calculate of with from zepto */
            var w = htmlEl.getBoundingClientRect().width;
            w = Math.round(w);
            w = w > 750 ? 750 : w;
            var newW = w / 750 * 100;
            htmlEl.style.fontSize = newW + 'px';
        }
        fitPage();
        var t;
        var func = function () {
            clearTimeout(t);
            t = setTimeout(fitPage, 25);
        }
        window.addEventListener('resize', func);
    }();
    </script>
</body>

</html>