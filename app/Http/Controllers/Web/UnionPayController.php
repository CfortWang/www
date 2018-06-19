<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Omnipay\Omnipay;
class UnionPayController extends Controller
{
    public function __construct()
    {
        $this->title = '网银在线支付';
    }
   
    public function UnionPay(){
        $gateway = Omnipay::create('UnionPay_Express');
        $gateway->setMerId('700000000000001');
        $gateway->setCertDir('C:/laragon/www/www/storage/app/unionpay/700000000000001_acp.pfx'); // .pfx file
        $gateway->setCertPath('C:/laragon/www/www/storage/app/unionpay/700000000000001_acp.pfx'); // .pfx file
        $gateway->setCertPassword('000000');
        $gateway->setReturnUrl('http://www.test/UnionPayReturn');
        $gateway->setNotifyUrl('http://www.test/notify');
        $gateway->setEnvironment('sandbox');
        $order = [
            'orderId'   => date('YmdHis'), //Your order ID
            'txnTime'   => date('YmdHis'), //Should be format 'YmdHis'
            'orderDesc' => '喜豆加盟费用', //Order Title
            'txnAmt'    => '1000000', //Order Total Fee
        ];

        //For PC/Wap
        $response = $gateway->purchase($order)->send();
        // dd($response);
        $a = $response->getRedirectHtml();
        echo $a;
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
        $gateway->setCertDir('C:/laragon/www/www/storage/app/unionpay/700000000000001_acp.pfx'); // .pfx file
        $gateway->setCertPath('C:/laragon/www/www/storage/app/unionpay/700000000000001_acp.pfx'); // .pfx file
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
