@extends('web.layouts.app')

@section('title', 'Main page')

@section('css')
@endsection

@section('content')
<div class="join-div-1">
    <div class="parHd parHd-join clearfix">
        <ul>
            <li class="toggle parHd-join-active"><p class="step-active">信息提交</p></li>
            <li class="toggle parHd-join-active"><p class="step-active">合同确认</p></li>
            <li class="toggle parHd-join-active"><p class="step-active">选择支付</p></li>
            <li class="toggle parHd-join-active"><p class="step-active">完成支付</p></li>
        </ul>
    </div>
</div>
<div class="pay-success union-pay-success">
    <div class="row">
        <div class="col-sm-12">
            <div class="pay-success-title"><img src="./img/seedo.png"><span class="pay-success-title-span">欢迎成为销售合伙人</span></div>
            <div class="pay-success-fee">用户名：<span class="pay-success-name">{{$name}}</span>  密码：<span class="pay-success-name">提交申请时设置的密码</span></div>
            <div class="pay-success-code">
                <div class="pay-success-img">
                    <img src="./img/download.png">
                </div>
                <p class="pay-download"><a href="/download/spapp" target="_blank">下载APP</a></p>
            </div>
            
        </div>
    </div>
</div>

@endsection

@section('scripts')
@endsection