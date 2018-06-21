@extends('web.layouts.app')

@section('title', 'Main page')

@section('css')
@endsection

@section('content')
<form name="payment" id="s" action="https://payment.chinapay.com/CTITS/service/rest/page/nref/000000000017/0/0/0/0/0" method="POST"
    target="_blank">
        <input type="hidden" value="20140728" name="Version"/>
        <input type="hidden" value="731111806120002" name="MerId" />
        <input type="hidden" value="0000000414189247" name="MerOrderNo" />
        <input type="hidden" value="20180621" name="TranDate" />
        <input type="hidden" value="150647" name="TranTime" />
        <input type="hidden" value="111" name="OrderAmt" />
        <input type="hidden" value="0001" name="TranType" />
        <input type="hidden" value="0001" name="BusiType" />
        <input type="hidden" value="CNY" name="CurryNo" />
        <input type="hidden" value="http://chinapay.test/chinapay_demo/pgReturn.php" name="MerPageUrl" />
        <input type="hidden" value="http://chinapay.test/chinapay_demo/bgReturn.php" name="MerBgUrl" />
        <input type="hidden" value="{{$signature}}" name="Signature" />
    </form>

@endsection

@section('scripts')
<script language=JavaScript>
    console.log($('#s').serialize())
	document.payment.submit();
</script>  
@endsection