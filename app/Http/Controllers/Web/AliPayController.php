<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Omnipay\Omnipay;

use App\Models\SalesPartnerSignUp;
use App\Models\PartnerAccount;
use App\Models\SalesPartner;
use App\Models\SalesPartnerType;
class AliPayController extends PayController
{
    public function __construct()
    {
        $this->title = '支付宝支付';
        $this->AliPay = Omnipay::create('Alipay_AopPage');
        $this->AliPay->setSignType('RSA2'); // RSA/RSA2/MD5
        $this->AliPay->setAppId('2018053060279390');
        $this->AliPay->setPrivateKey('MIIEpAIBAAKCAQEAr/7vdTeu490D8EIwgi+Xvssjjr2QRiWljW91jyeNZllWm4cy2l/CEG8GQVr0msX588HAKPbv9DcUHskkLDhjoN87iOpg9FkzJMVPu2XDEW0zu3ctDY1YXFqwfQFj/6wqzkO9tHqH3PqeG9zDnwSFI6Q99rVFyV2xSIhCnBdJICe1c+yN4FNyB/soasnFEWKGu/SmxouLcZ3O2rzMW3cjBwCJRcGaMd8ie1YpyoJ5fxBD57SAW960Q5FspGjIphUS9imaHcNxgv+HgNvK4kos3+ITjRkLtzUQrreBDMGYd0oA310AT9Avk1hdskAqMnNHE1k69XxK0eL8jMBw6lFbuQIDAQABAoIBAHwqs4ySfYv7mVS/jfO7WibcsLh7GzeyRcu0UE9wSz1jWEwgJYuVtZfcjKA9aIdtl7wW/Nip5374APT7Wc7s9bVA6YLeQQsDh6awomEHGYnI7o+bNCj0iNuXjB6VhZSTRhwCBOw46nPISRZFOaqOCNStgp31JEg+Ft6ia8QuVYQd8y2COFx19wy4QKkDYhGcIjyX8NKtd6W5S3ktHqp2IzhdVh5QEKGGFk4ifn9Xl1qpRqhGiea48hWiY7gS4ILO0wBHJEza1szwL08AkIP5fKyOHObS5R4VW/3fD9YRpqhVFKaC9ySUV2bkFZmIIECdKE3rHCcpZvIveA0M7+mTFRUCgYEA54mj/0BLUqWTK4PWYngBkgbgCEP5QAHfX5ywb7FwMJ7CFhA8TBgUIM0Gma0tVHT8YDCJ33SAQQ2Xi0Zizghvu+UXwygGWa8GfEys0dBtNkseteX27bZXLSvpgnYgYL+eAcDJk/hFb+Tz2Nlz22HBr0flxpqhuE8w4bG1ucpVrOMCgYEAwpcQk4yL2rFCEg5uwNVq4OSeGp9k1MMSR/ZlCdqscLwwLHw9Z+pDFle0/HDbz01jqQ/w1HzZcXPXKGUZ+tP0EqpzrORkNBJpAWALvXbdCuw0jjAXCeIXV7ENZvzOg8wXtoZL/aCUT4uaWXamkiul8bc5IW+XVvRiQ7aqdcza87MCgYEAzDeumlhPF1pK8DqcQMWwPOgreZ7anQYJyv8c76cFWRzt+x/ezw790eCETc9dB/0XDJBDSwAqjzY5z/II+8idJJDv4IXQ9BFYGxJV68l2Skj/kVh/7zLAuWrdzt/5ttvLtaghI437ULIUEdPaSEl01/EGTaHduf6/EpH3wyMfZhkCgYEAq3UURA5pBI9/mg1hhUQHYpXOwcKEw/wGVaZDrQUjQEpxYCEwsil2Z29sp6qB5A1arRLAr1o69n6NrKg41gyAWRobxtGPgVpfb7jDX3QmnIM4Y7j389tlmf0FxCMpjHP+yPNYbehaBiUKIZ4sc0tGcs9w5YdAIHxBQUzosdeJbYUCgYB8Ff6fGmUN9lME8Wb6iFyVixMFYlFe5L/Gs9webLdYmqQJCHqqhh9Vad1hoeg2G2XvhT1Qq6fMOVanWnDy+nBUlKwozx1z303vnmMTjV+xIZ2q8qiBhy9v6yxdsfPpGLZoidOJkd30V0CrBPLA1PrVnG2krkjcIutQJZtECI6Exw==');
        $this->AliPay->setAlipayPublicKey('MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAlv3Ea0i7VBhJj2/+izQ3esPW3I0e/TPBlKIjTILwv57xnS62EAz+0pI6gm6hOoCvVcITrlvT+WjrmB8eWaZy71s+YJ7iiB81AzSvjcbyXQ5mZPWlNLo6dZ8qZH22YRYjPQncFp5qKpvrI4ChTSBezHxFUrtSZQVmt508ZStynv80Qj+b8SuRHaQ51nC/Fik+73t3gGTPPbG54lVOzqTatXRXz7LMnc1x2IOgrhuKxHZRpRn5wBw7NI3BYblGWwXBpWbbxuBb8LtiwIpGhbN8xsNBcL6a6MK+aa5plpG8R3VvapJcbPgnyGISfqL2h2V8S7Xm1NmYRztD2/2EPAXpAwIDAQAB');
        $this->AliPay->setReturnUrl('http://'.$_SERVER['HTTP_HOST'].'/AliPayReturn');
        $this->AliPay->setNotifyUrl('http://'.$_SERVER['HTTP_HOST'].'/AliPayNotify');
    }

    public function AliPay(Request $request)
    {
        

        /**
         * @var AopTradePagePayResponse $response
         */
        $seq = $request->session()->get('sale_id');
        if(!$seq){
            return view('web.contents.unionPayFailed', [
                'title' => '请联系客服',
                'total' => 0,
            ]);
        }
        $gateway = $this->AliPay;
        $data = SalesPartnerSignUp::where('seq', $seq)->where('payment_status','unpaid')->first();
        $response = $gateway->purchase()->setBizContent([
            'subject'      => '喜豆加盟费',
            'out_trade_no' => $data->payment_code,
            'total_amount' => $data->payment_amount/100,
            'product_code' => 'FAST_INSTANT_TRADE_PAY',
        ])->send();

        $url = $response->getRedirectUrl();
        $response->redirect();
    }

    public function AliPayNotify(Request $request){
        $gateway = $this->AliPay;
        $gateway_request = $gateway->completePurchase();
        $gateway_request->setParams(array_merge($_POST, $_GET)); //Don't use $_REQUEST for may contain $_COOKIE
        /**
         * @var AopCompletePurchaseResponse $response
         */
        try {
            $response = $gateway_request->send();
            if($response->isPaid()){
                /**
                 * Payment is successful
                 */
                $data = SalesPartnerSignUp::where('payment_code', $request->input('out_trade_no'))->first();
                if(!$data){
                    return view('web.contents.unionPayFailed', [
                        'title' => '请联系客服',
                        'total' => $request->input('total_amount'),
                    ]);
                }
                if($data->payment_status=='unpaid'){
                    $data->payment_status = 'paid';
                    $data->payment_type = 'alipay';
                    $data->save();
                    $save_sta = $this->saveSales($data->seq);
                }
                $data->payment_result = json_encode($request->input());
                $data->save();
                die('success'); //The notify response should be 'success' only
            }else{
                /**
                 * Payment is not successful
                 */
                die('fail'); //The notify response
            }
        } catch (Exception $e) {
            /**
             * Payment is not successful
             */
            die('fail'); //The notify response
        }
    }

    //页面跳转同步通知页面
    public function AliPayReturn(Request $request){
        $gateway = $this->AliPay;
        $gateway_request = $gateway->completePurchase();
        $gateway_request->setParams(array_merge($_POST, $_GET)); //Don't use $_REQUEST for may contain $_COOKIE
        /**
         * @var AopCompletePurchaseResponse $response
         */
        try {
            $response = $gateway_request->send();
            if($response->isPaid()){
                $data = SalesPartnerSignUp::where('payment_code', $request->input('out_trade_no'))->first();
                if(!$data){
                    return view('web.contents.unionPayFailed', [
                        'title' => '请联系客服',
                        'total' => $request->input('total_amount'),
                    ]);
                }
                if($data->payment_status=='unpaid'){
                    $data->payment_status = 'paid';
                    $data->payment_type = 'alipay';
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
                        'total' => $request->input('total_amount'),
                    ]);
                }
            }else{
                /**
                 * Payment is not successful
                 */
                die('fail'); //The notify response
            }
        } catch (Exception $e) {
            /**
             * Payment is not successful
             */
            die('fail'); //The notify response
        }
    }

}
