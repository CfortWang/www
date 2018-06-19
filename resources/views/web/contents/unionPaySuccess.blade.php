@extends('web.layouts.app')

@section('title', 'Main page')

@section('css')
@endsection

@section('content')
<div class="paySuccess unionPaySuccess">
    <div class="row">
        <div class="col-sm-12">
            <div class="paySuccess-title"><img src="./img/pay-success.jpg">支付成功</div>
            <div class="paySuccess-fee">加盟费{{$total}}</div>
            <div class="paySuccess-home"><a href="/">返回首页</a></div>
            
        </div>
    </div>
</div>

@endsection

@section('scripts')
@endsection