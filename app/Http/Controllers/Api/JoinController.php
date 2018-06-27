<?php

namespace App\Http\Controllers\Api;

use Validator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Models\SalesPartnerSignUp;
use App\Models\PartnerAccount;
use App\Models\SalesPartner;
use App\Models\SalesPartnerType;
use App\Models\Country;
use App\Models\PhoneNumCertification;

class JoinController extends Controller
{
    public function __construct()
    {

    }

    public function create(Request $request)
    {
        $post = Input::only([
            "name",
            "password",
            "email",
            "phone_num",
            "gender",
            "type",
            "province",
            "city",
            "area",
            'recommender',
            'certification'
            ]
        );
        $validator = Validator::make($post, [
            'name' => 'required|string|min:2|max:50',
            'password' => 'required|string|min:2|max:50',
            'email' => 'required|email',
            'phone_num' => 'required|string|min:2|max:50',
            'type' => 'required|in:P,D,A,S',
            "gender" =>'required|in:male,female',
            "province" =>'numeric|min:1',
            "city" =>'numeric|min:1',
            "area" =>'numeric|min:1',
            'certification' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->responseBadRequest('数据格式错误');
        }
        $certification = $post['certification'];
        $code = PhoneNumCertification::where('code',$certification)->where('country','1')->where('phone_num',$post['phone_num'])->first();
        if(!$code){
            return $this->responseBadRequest('验证码错误');
        }
        $id = $post['name'];

        $exits = PartnerAccount::where('id', $id)->first();

        if($exits){
            return $this->responseConflict('用户名已存在');
        }
        $exits = SalesPartnerSignUp::where('name', $id)->first();

        if($exits){
            return $this->responseConflict('用户名已存在');
        }
        $recommender = null;
        if(isset($post['recommender'])&&$post['recommender']){
            $re_exits = PartnerAccount::where('id', $post['recommender'])->first();
            if($re_exits){
                $se_exits =  SalesPartner::where('partner_account',$re_exits->seq)->first();
                if($se_exits){
                    $recommender = $se_exits->seq;
                }else{
                    return $this->responseConflict('推荐人不存在');
                }
            }else{
                return $this->responseConflict('推荐人不存在');
            }
        }
        $amount = SalesPartnerType::where('type',$post['type'])->first();
        $sale_id = SalesPartnerSignUp::create([
            'id' => $id, 
            'phone_num' => $post['phone_num'],
            'name' => $post['name'],
            'email' => $post['email'],
            'password' => bcrypt($post['password']),
            'gender' => $post['gender'],
            'country' => 1,
            'payment_status' => 'unpaid',
            'type' => $post['type'],
            // 'payment_amount' => $amount->min_premium,
            'payment_amount' => 10,
            'payment_code' => md5($post['type'].'_1'.'_'.$post['province'].'_'.$post['phone_num'].'_'.$post['email'].microtime()),
            'province' => $post['province'],
            'city' => isset($post['city'])?$post['city']:null,
            'area' => isset($post['area'])?$post['area']:null,
            'recommender' => $recommender,
        ]);
        $request->session()->put('sale_id', $sale_id->seq);
        // $request->session()->put('payment_amount', $amount->min_premium);
        $request->session()->put('payment_amount',10);
        $request->session()->put('name', $post['name']);
        return $this->responseOK('create buyer success', $sale_id);
    }

    public function sms(Request $request){
        $input = Input::only('country', 'phone_num', 'lang');

        $validator = Validator::make($input, [
            'country'   => 'required|integer|min:1',
            'phone_num' => 'required|numeric',
            'lang'      => 'nullable|in:zh,en,ko,ja',
        ]);
        if ($validator->fails()) {
            return $this->responseBadRequest('数据验证失败.');
        }
        //check
        $exist = PartnerAccount::where('phone_num', $request->input('phone_num'))->first();
        if($exist){
            return $this->responseBadRequest('电话号码已存在.');
        }
        $code = rand(100000, 999999);

        $country = $request->input('country');
        $phoneNum = $request->input('phone_num');
        $lang = $request->input('lang', 'zh');

        $type='sp_sign_up';
        $country = Country::where('seq', $country)->first();
        $result = $this->send_sms($country->calling_code, $phoneNum, $code, $lang, $type);

        if ($result->code == 2) {
            PhoneNumCertification::create([
                'country'       => $country->seq,
                'phone_num'     => $phoneNum,
                'code'          => $code,
                'type'          => $type,
                'calling_code'  => $country->calling_code,
            ]);
            return $this->responseOk('发送成功');
        } else {
            return $this->responseServerError('短信发送失败', $result);
        }
        // return $this->responseOK('create buyer success', '1');
    }
    public function send_sms($callingCode, $phoneNum, $code, $lang, $type)
    {
        $smsContentType = [
            'default' => [
                'zh'    => 'Your verification code is 【$】',
                'en'    => 'Your verification code is 【$】',
                'ko'    => 'Your verification code is 【$】',
                'ja'    => 'Your verification code is 【$】',
            ],
            'sign_up'   => [
                'zh'    => 'Your verification code is 【$】',
                'en'    => 'Your verification code is 【$】',
                'ko'    => 'Your verification code is 【$】',
                'ja'    => 'Your verification code is 【$】',
            ],
            'find_pw' => [
                'zh'    => 'Your verification code is 【$】',
                'en'    => 'Your verification code is 【$】',
                'ko'    => 'Your verification code is 【$】',
                'ja'    => 'Your verification code is 【$】',
            ],
            'sp_sign_up' => [
                'zh'    => 'Your verification code is 【$】',
                'en'    => 'Your verification code is 【$】',
                'ko'    => 'Your verification code is 【$】',
                'ja'    => 'Your verification code is 【$】',
            ]
        ];

        $content = $smsContentType[$type][$lang];
        $content = str_replace('$', $code, $content);

        $url = "http://api.isms.ihuyi.com/webservice/isms.php?method=Submit";

        

        $postFields = "";
        $postFields .= "&"."format=json";
        $postFields .= "&"."account=".env('ISMS_IHUYI_ACCOUNT', '');
        $postFields .= "&"."password=".env('ISMS_IHUYI_PASSWORD', '');
        $postFields .= "&"."mobile=".$callingCode.' '.$phoneNum;
        $postFields .= "&"."content=".rawurlencode($content);
        
        $curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_NOBODY, true);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $postFields);
        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response);
    }
}
