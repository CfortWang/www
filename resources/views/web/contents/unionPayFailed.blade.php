@extends('web.layouts.app')

@section('title', 'Main page')

@section('css')
@endsection

@section('content')
<div class="pay-success unionPay-success">
    <div class="row">
        <div class="col-sm-12">
            <div class="pay-success-title"><img src="./img/pay-failed.jpg"><span class="pay-success-title-span">支付失败</span></div>
            <div class="pay-success-fee">加盟费{{$total}}</div>
            <div class="pay-success-home"><a href="/">返回首页</a></div>
            
        </div>
    </div>
</div>

@endsection

@section('scripts')
@endsection