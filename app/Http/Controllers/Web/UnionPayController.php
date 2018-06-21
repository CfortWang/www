<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SecssUtil;
use GuzzleHttp\Client;
class UnionPayController extends Controller
{
    public function __construct()
    {
        $this->title = '网银在线支付';
    }
   
    public function UnionPay(){
        $paramArray=array(
            "Version"=> '20140728',
            "MerId"=> '731111806120002',
            "MerOrderNo"=> '0000000414189247',
            "TranDate"=> '20180621',
            "TranTime"=> '150647',
            "OrderAmt"=> '111',
            "TranType"=> '0001',
            "BusiType"=> '0001',
            "CurryNo"=> 'CNY',
            "MerPageUrl"=> 'http://chinapay.test/chinapay_demo/pgReturn.php',
            "MerBgUrl"=> 'http://chinapay.test/chinapay_demo/bgReturn.php',
        );
        $secssUtil = new SecssUtil();
        $securityPropFile = storage_path('app\unionpay\security_test.properties');
        $secssUtil->init($securityPropFile);
        $secssUtil->sign($paramArray);
        if("00"!==$secssUtil->getErrCode()){
            echo"签名过程发生错误，错误信息为-->".$secssUtil->getErrMsg();
            return;
        }
        $signature=$secssUtil->getSign();
        return view('web.contents.unionpay', [
            'title' => $this->title,
            'signature' => $signature
        ]);
        dd($response);
    }

    // 判断交易是否成功
    public function UnionPayReturn(){
        if ($_POST['respCode'] == "00") {
            return view('web.contents.unionPaySuccess', [
                'title' => '支付成功',
                'total' => $_POST['txnAmt']/100
        ]);
        }else{
            return view('web.contents.unionPayFailed', [
                'title' => '支付失败',
                'total' => $_POST['txnAmt']/100
        ]);
        }
    }
    
    public function undo(){
        $gateway = Omnipay::create('UnionPay_Express');
        $gateway->setMerId('700000000000001');
        $gateway->setCertDir('C:/laragon/www/wwwapp\unionpay\B2.pfx'); // .pfx file
        $gateway->setCertPath('C:/laragon/www/wwwapp\unionpay\B2.pfx'); // .pfx file
        $gateway->setCertPassword('000000');
        $gateway->setReturnUrl('http://www.test/UnionPayReturn');
        $gateway->setNotifyUrl('http://www.test/notify');
        $response = $gateway->consumeUndo([
            'orderId' => '20180619075213', //Your site trade no, not union tn.
            'txnTime' => date('YmdHis'), //Regenerate a new time
            'txnAmt'  => '1000000', //Order total fee
            'queryId' => '341806190752130667028', //Order total fee
        ])->send();
        // dd($response);
        dd($response->isSuccessful());
        dd($response->getData());
    }
}
