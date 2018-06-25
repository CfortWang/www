@extends('web.layouts.app')

@section('title', 'Main page')

@section('css')
<link rel="stylesheet" type="text/css" href="./css/bootstrapValidator.css" />
@endsection

@section('content')
<div class="row">
    <p class="term-title">选择支付方式</p>
    <div class="joinPayment">
        <div class="joinPayment-title">
            <div style="padding-left:40px"><span>应支付金额：</span><span class="payment_amount">{{Session::get('payment_amount')/100}}</span>元
             <span style="padding-left:40px">用户名：</span><span>{{Session::get('name')}}</span>
            </div>
        </div>
        <div class="joinPayment-content">
            <div class="joinPayment-content-title">支付方式</div>
            <ul class="nav nav-tabs" style="border-bottom:none">
                <li class="joinPayment-li active"><a href="javascript:;" id="online-contain">在线支付</a></li>
                <li class="joinPayment-li"><a href="javascript:;" id="tran-contain">银行汇款</a></li>
            </ul>
            <div class="pay-contain online-contain">
                <div class="pay-contain-indiv">
                    <a href="/AliPay">
                        <img src="./img/alipay.png"><span class="pay-contain-span">支付宝支付</span>
                    </a>
                </div>
                <div class="pay-contain-indiv" style="margin-left:10px">
                    <a href="/UnionPay">
                        <img src="./img/unionpay.png"><span class="pay-contain-span">银联支付</span>
                    </a>
                </div>
            </div>
            <div class="pay-contain tran-contain" style="display:none">
                <p class="tran-contain-title"><strong>转账汇款，请先联系在线客服。</strong></p>

                <p>1.由于转账汇款时间较长，将为您带来诸多不便，请您谅解。</p>

                <p>2.在完成转账或付款业务后，请您尽快与我们联系（400-XXX-XXX 或 在线客服），并提供姓名、金额、用户名。</p>
                <p style="padding: 15px;"></p>
                <p>单位名称：深圳喜豆文化发展有限公司</p>

                <p>开户银行：招商银行股份有限公司深圳南硅谷支行</p>

                <p>银行账号：7559 3811 3410 703</p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $('#tran-contain').click(function(){
        $('.online-contain').hide();
        $('.tran-contain').show();
        $('.joinPayment-li').removeClass('active');
        $(this).parent().addClass('active');
    })
    $('#online-contain').click(function(){
        $('.tran-contain').hide();
        $('.online-contain').show();
        $('.joinPayment-li').removeClass('active');
        $(this).parent().addClass('active');
    })
</script>
@endsection