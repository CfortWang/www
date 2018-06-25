<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Web\PayController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\SalesPartnerSignUp;

use SecssUtil;
use Omnipay\Omnipay;

class UnionPayController extends PayController
{
    public function __construct()
    {
        $this->title = '网银在线支付';
    }
   
    public function UnionPay(Request $request){
        $key_file = array(
            "sign.file" => storage_path('app/unionpay/789.pfx'),
            "sign.file.password" => "666352",
            "sign.cert.type" => "PKCS12",
            "sign.invalid.fields" => "Signature",
            "verify.file" => storage_path('app/unionpay/B2C.cer'),
            "signature.field" => "Signature",
            "log4j.name" => "cpLog",
        );
        $seq = $request->session()->get('sale_id');
        $data = SalesPartnerSignUp::where('seq', $seq)->where('payment_status','unpaid')->first();
        if(!$seq){
            return view('web.contents.unionPayFailed', [
                'title' => '请联系客服',
                'total' => 0,
            ]);
        }
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
        $securityPropFile = storage_path('app/unionpay/security_test.properties');
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
            $securityPropFile = storage_path('app/unionpay/security_test.properties');
            $secssUtil->init($securityPropFile);
            if ($secssUtil->verify($request->input())&&$request->input('OrderStatus')=='0000') {
                $data = SalesPartnerSignUp::where('payment_code', $request->input('MerOrderNo'))->first();
                if($data){
                    if($data->payment_status=='unpaid'){
                        $data->payment_status = 'paid';
                        $data->payment_type = 'card';
                        $data->save();
                        $save_sta = $this->saveSales($data->seq);
                    }else{
                        $save_sta['status'] = true;
                    }
                    if($save_sta['status']){
                        return view('web.contents.unionPaySuccess', [
                            'title' => '支付成功',
                            'total' => $data->payment_amount/100,
                            'name' => $data->name,
                        ]);
                    }else{
                        return view('web.contents.unionPayFailed', [
                            'title' => '请联系客服',
                            'total' => $data->payment_amount/100,
                        ]);
                    }
                }
                else{
                    return view('web.contents.unionPayFailed', [
                        'title' => '请联系客服',
                        'total' => $request->input('OrderAmt')/100,
                    ]);
                }
            } else {
                return view('web.contents.unionPayFailed', [
                    'title' => '请联系客服',
                    'total' => $request->input('OrderAmt')/100,
                ]);
            }
        }else{
            return view('web.contents.unionPayFailed', [
                'title' => '支付失败',
                'total' => $request->input('OrderAmt')/100,
        ]);
        }
    }
    
    public function UnionPayNotity(Request $request){
        $code = $request->input('TranType');
        if ($code == "0001") {
            $secssUtil = new SecssUtil();
            $securityPropFile = storage_path('app/unionpay/security_test.properties');
            $secssUtil->init($securityPropFile);
            if ($secssUtil->verify($request->input())&&$request->input('OrderStatus')=='0000') {
                $data = SalesPartnerSignUp::where('payment_code', $request->input('MerOrderNo'))->first();
                if($data){
                    if($data->payment_status=='unpaid'){
                        $data->payment_status = 'paid';
                        $data->payment_type = 'card';
                        $data->save();
                        $save_sta = $this->saveSales($data->seq);
                        $this->responseOK('ok');
                    }
                    $data->payment_result = json_encode($request->input());
                    $data->save();
                }
            }
        }

    }
}
