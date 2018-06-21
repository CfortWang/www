<?php

namespace App\Http\Controllers\Api;

use Validator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Models\SalesPartnerSignUp;
use App\Models\PartnerAccount;
use App\Models\SalesPartnerType;

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
            'recommender'
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
        ]);
        if ($validator->fails()) {
            return $this->responseBadRequest('数据格式错误');
        }
        $id = $post['name'];

        $exits = PartnerAccount::where('id', $id)->first();

        if($exits){
            return $this->responseConflict('用户名已存在');
        }
        $recommender = '';
        if(isset($post['recommender'])){
            $re_exits = PartnerAccount::where('id', $post['recommender'])->first();
            if($re_exits){
                $recommender = $re_exits->seq;
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
            'payment_amount' => $amount->min_premium,
            'payment_code' => md5($post['type'].'_1'.'_'.$post['province'].'_'.$post['phone_num'].'_'.$post['email'].microtime()),
            'province' => $post['province'],
            'city' => isset($post['city'])?$post['city']:null,
            'area' => isset($post['area'])?$post['area']:null,
            'recommender' => $recommender,
        ]);
        $request->session()->put('sale_id', $sale_id);
        $request->session()->put('payment_amount', $amount->min_premium);
        $request->session()->put('name', $post['name']);
        return $this->responseOK('create buyer success', $sale_id);
    }
}
