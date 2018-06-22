<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\SalesPartnerSignUp;

use SecssUtil;

class UnionPayController extends Controller
{
    public function __construct()
    {
        $this->title = '网银在线支付';
    }
   
    public function UnionPay(Request $request){
        $seq = $request->session()->get('sale_id');
        $data = SalesPartnerSignUp::where('seq', $seq)->where('payment_status','unpaid')->first();
        $orderNo = $data->payment_code;
        $paramArray=array(
            "Version"=> '20140728',
            "MerId"=> '731111806120002',
            "MerOrderNo"=> $orderNo,
            "TranDate"=> date('Ymd'),
            "TranTime"=> date('Hms'),
            "OrderAmt"=> $data->payment_amount,
            "TranType"=> '0001',
            "BusiType"=> '0001',
            "CurryNo"=> 'CNY',
            "MerPageUrl"=> 'http://'.$_SERVER['HTTP_HOST'].'/UnionPayReturn',
            "MerBgUrl"=> 'http://'.$_SERVER['HTTP_HOST'].'/UnionPayNotity',
        );
        $secssUtil = new SecssUtil();
        new SecssUtil();
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
            'signature' => $signature,
            'MerOrderNo' => $paramArray['MerOrderNo'],
            'TranDate' => $paramArray['TranDate'],
            'TranTime' => $paramArray['TranTime'],
            'OrderAmt' => $paramArray['OrderAmt'],
            'MerPageUrl' => $paramArray['MerPageUrl'],
            'MerBgUrl' => $paramArray['MerBgUrl'],
        ]);
    }

    // 判断交易是否成功
    public function UnionPayReturn(Request $request){
        $code = $request->input('TranType');
        if ($code == "0001") {
            $secssUtil = new SecssUtil();
            $securityPropFile = storage_path('app\unionpay\security_test.properties');
            $secssUtil->init($securityPropFile);
            if ($secssUtil->verify($request->input())) {
                $data = SalesPartnerSignUp::where('payment_code', $request->input('MerOrderNo'))->where('payment_status','unpaid')->first();
                if($data){
                    $data->payment_status = 'paid';
                    $data->save();
                    return view('web.contents.unionPaySuccess', [
                        'title' => '支付成功',
                        'total' => $request->input('OrderAmt'),
                        'name' => $data->name,
                    ]);

                }
                else{
                    return view('web.contents.unionPayFailed', [
                        'title' => '请联系客服',
                        'total' => $request->input('OrderAmt'),
                    ]);
                }
            } else {
                return view('web.contents.unionPayFailed', [
                    'title' => '请联系客服',
                    'total' => $request->input('OrderAmt'),
                ]);
            }
        }else{
            return view('web.contents.unionPayFailed', [
                'title' => '支付失败',
                'total' => $request->input('OrderAmt'),
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
