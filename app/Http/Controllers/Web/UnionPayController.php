<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UnionPayController extends Controller
{
    public function __construct()
    {
        $this->title = 'Main';
    }
   
    public function UnionPay(){
        // response.setHeader("content-type", "text/html;charset=UTF-8"); 
        $unionpay = app('unionpay.wap');
        $unionpay->setOrderId(20180615055729);
        $unionpay->setTxnAmt(1000);
        $unionpay->setTxnTime(date('YmdHis'));
        $unionpay->setOriginQueryId(0);
        // $unionpay->setVersion('5.1.0');
        //返回一个表单
        return $unionpay->consume();
    }
    public function UnionPayReturn(){
        // 判断交易是否成功
         if ($_POST['respCode'] == "00") {
             //pay success
             Log::info('支付成功'.$_POST['orderId']);
             echo "支付成功！".$_POST['orderId'];
         }else{
             //pay fail
             Log::info('支付失败'.$_POST['orderId']);
             echo "支付失败".$_POST['orderId'];
         }
     }
}
