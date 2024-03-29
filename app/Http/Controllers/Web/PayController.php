<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\SalesPartnerSignUp;
use App\Models\PartnerAccount;
use App\Models\SalesPartner;
use App\Models\SalesPartnerType;

use Carbon\Carbon;

class PayController extends Controller
{

  public function saveSales($seq)
  {
    $data =  SalesPartnerSignUp::where('seq', $seq)->first();
    try {
      DB::beginTransaction();
      $partner_id = PartnerAccount::create([
          'id' => $data->id, 
          'phone_num' => $data->phone_num,
          'name' => $data->name,
          'email' => $data->email,
          'password' => $data->password,
          'gender' => $data->gender,
          'bank_account_owner' => $data->bank_account_owner?$data->bank_account_owner:null,
          'bank_account' => $data->bank_account?$data->bank_account:null,
          'bank' => $data->bank?$data->bank:null,
      ]);

      $type = SalesPartnerType::where('type',$data->type)->first();
      if(empty($type)){
          $error['status']  = false;
          $error['msg'] = 'Type error'; 
          return $error;
      }
      
      switch ($data->type) {
          case 'P': 
              $exits =  SalesPartner::where('country',$data->country)
              ->where('province',$data->province)
              ->where('type','P')
              ->first();
              $dist_q35pkg_cnt = SalesPartner::where('country',$data->country)
              ->where('province',$data->province)
              ->sum('sale_q35pkg_cnt');
              break;
          case 'D':
              $exits = SalesPartner::where('country',$data->country)
              ->where('province',$data->province)
              ->where('city',$data->city)
              ->where('type','D')
              ->first();
              
              $dist_q35pkg_cnt = SalesPartner::where('country',$data->country)
              ->where('province',$data->province)
              ->where('city',$data->city)
              ->sum('sale_q35pkg_cnt');
              break;
          case 'A':
              $exits = SalesPartner::where('country',$data->country)
              ->where('province',$data->province)
              ->where('city',$data->city)
              ->where('area',$data->area)
              ->where('type','A')
              ->first();
              $dist_q35pkg_cnt = SalesPartner::where('country',$data->country)
              ->where('province',$data->province)
              ->where('city',$data->city)
              ->where('area',$data->area)
              ->sum('sale_q35pkg_cnt');
              break;
          case 'S':
              $dist_q35pkg_cnt = 0;
              $exits = false;
              break;
          default:
              return 'Type error';
              break;
      }
      if($exits){
          $error['status']  = false;
          $error['msg'] = 'Already exist soles , please check'; 
          return $error;
      }
      if ($data->type === 'P') {
          $provider = null;
          $distributor = null;
          $agency = null;
      } else if ($data->type === 'D') {
          $provider = 1;
          $distributor = null;
          $agency = null;
      } else if ($data->type === 'A') {
          $provider = 1;
          $distributor = 1;
          $agency = null;
      } else if ($data->type === 'S') {
          $provider = 1;
          $distributor = 1;
          $agency = 1;
      }
      

      $provider_id = SalesPartner::where('country',$data->country)
              ->where('province',$data->province)
              ->where('type','P')
              ->first();
      if($provider_id){
          $provider = $provider_id->seq;
      }
      if(isset($data->city)){
          $distributor_id = SalesPartner::where('country',$data->country)
                  ->where('province',$data->province)
                  ->where('city',$data->city)
                  ->where('type','D')
                  ->first();
          if($distributor_id){
              $distributor = $distributor_id->seq;
          }
      }
      if(isset($data->area)){
          $agency_id = SalesPartner::where('country',$data->country)
                  ->where('province',$data->province)
                  ->where('city',$data->city)
                  ->where('area',$data->area)
                  ->where('type','A')
                  ->first();
          if($agency_id){
              $agency = $agency_id->seq;
          }
      }
      $sale_data = [
          'type' => $data->type,
          'country' => $data->country,
          'province' => $data->province,
          'city' => isset($data->city)?$data->city:null,
          'area' => isset($data->area)?$data->area:null,
          'recommender' => $data->recommender?$data->recommender:null,
          'dist_q35pkg_cnt' => $dist_q35pkg_cnt,
          'sale_q35pkg_cnt' => $type->sale_q35pkg_cnt,
          'curr_q35pkg_cnt' => 0,
          'premium' => $type->min_premium,
          'partner_account' => $partner_id->seq,
          'partner_level' => 1,
          'prev_partner_level' => 1,
          'provider' => $provider,
          'distributor' => $distributor,
          'agency' => $agency,
          'status' => 'registered',
          'premium_paid_at' => Carbon::now()
      ]; 
      $sale_id = SalesPartner::create($sale_data);
      switch ($data->type) {
          case 'P': 
              unset($sale_data);
              $sale_data['provider']  = $sale_id->seq;
              $dist_q35pkg_cnt = SalesPartner::where('country',$data->country)
              ->where('province',$data->province)
              ->update($sale_data);
              break;
          case 'D':
              unset($sale_data);
              $sale_data['distributor']  = $sale_id->seq;
              $dist_q35pkg_cnt = SalesPartner::where('country',$data->country)
              ->where('province',$data->province)
              ->where('city',$data->city)
              ->update($sale_data);
              break;
          case 'A':
              unset($sale_data);
              $sale_data['agency']  = $sale_id->seq;
              $dist_q35pkg_cnt = SalesPartner::where('country',$data->country)
              ->where('province',$data->province)
              ->where('city',$data->city)
              ->where('area',$data->area)
              ->update($sale_data);
              break;
          case 'S':
              $dist_q35pkg_cnt = 0;
          break;
      }
      $this->send_smg($data->phone_num);
      DB::commit();
      $success['status'] = true;
      $success['msg'] = '成功';
      return $success;

    } catch (\Exception $e) {
        DB::rollback();
        $error['status']  = false;
        $error['msg'] = '数据库写入失败'; 
        return $error;
    }
  }
  public function send_smg($phoneNum){
    $smsContentType = [
        'zh'    => '欢迎您成为喜豆beanpop销售合伙人。如果有更多业务相关的问题，可致电我们的客服中心:400-825-0266。',
        'en'    => 'Your verification code is 【$】',
        'ko'    => 'Your verification code is 【$】',
        'ja'    => 'Your verification code is 【$】',
    ];

    $content = $smsContentType['zh'];
    // $content = str_replace('$', $code, $content);

    // $url = "http://api.isms.ihuyi.com/webservice/isms.php?method=Submit";

    $url = "http://106.ihuyi.com/webservice/sms.php?method=Submit";

    $postFields = "";
    $postFields .= "&"."format=json";
    $postFields .= "&"."account=".env('ISMS_IHUYI_ACCOUNT_CHINA', '');
    $postFields .= "&"."password=".env('ISMS_IHUYI_PASSWORD_CHINA', '');
    $postFields .= "&"."mobile=".$phoneNum;
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
