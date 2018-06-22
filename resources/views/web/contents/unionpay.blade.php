@extends('web.layouts.app')

@section('title', 'Main page')

@section('css')
@endsection

@section('content')
<form name="payment" id="s" action="https://payment.chinapay.com/CTITS/service/rest/page/nref/000000000017/0/0/0/0/0" method="POST"
    >
        <input type="hidden" value="20140728" name="Version"/>
        <input type="hidden" value="731111806120002" name="MerId" />
        <input type="hidden" value="{{$MerOrderNo}}" name="MerOrderNo" />
        <input type="hidden" value="{{$TranDate}}" name="TranDate" />
        <input type="hidden" value="{{$TranTime}}" name="TranTime" />
        <input type="hidden" value="{{$OrderAmt}}" name="OrderAmt" />
        <input type="hidden" value="0001" name="TranType" />
        <input type="hidden" value="0001" name="BusiType" />
        <input type="hidden" value="CNY" name="CurryNo" />
        <input type="hidden" value="{{$MerPageUrl}}" name="MerPageUrl" />
        <input type="hidden" value="{{$MerBgUrl}}" name="MerBgUrl" />
        <input type="hidden" value="{{$signature}}" name="Signature" />
    </form>
    <div class="row">
        <div class="pay-jump-container">
            <p>请等待支付跳转。。。</p>
        </div>
    </div>
@endsection

@section('scripts')
<script language=JavaScript>
    console.log($('#s').serialize())
	document.payment.submit();
</script>  
@endsection