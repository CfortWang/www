<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Cache;

use App\Models\WCGame;
use App\Models\WCEntry;

class WcController extends Controller
{
	public function __construct()
	{
	$this->title = '首页';
	}

	public function index()
	{
		$data = WCGame::where('status','progress')->get();
		$sum = WCEntry::where('seq','>',0)->distinct('phone_num')->count('phone_num');
		$timestamp = time();
		$nonceStr = str_random(random_int(20,32));
		$signature = $this->wechat_signature($timestamp,$nonceStr);
		return view('web.contents.wc', [
			'title' => '竞猜',
			'data'  => $data,
			'sum'   => $sum,
			'appId' => env('WECHAT_GROUP_APP_ID', ''),
			'signature' => $signature,
			'timestamp' => $timestamp,
			'nonceStr' => $nonceStr,
			'ticket'  =>Cache::get('wechat_access_ticket'),
		]);
	}
	public function result(Request $request){
		$phone_num  = $request->session()->get('wc_phone_num');
		if(!$phone_num){
			return $this->responseConflict('数据未知');
		}
		$sum = WCEntry::where('phone_num',$phone_num)->distinct('created_at')->select('created_at')->orderBy('created_at','desc')->get();
		foreach ($sum as $key => $value) {
			$data[$key]['time'] = date('Y-m-d',strtotime($value->created_at));
			$data[$key]['data'] = WCEntry::where('WCEntry.phone_num',$phone_num)->where('WCEntry.created_at',$value->created_at)
			->leftJoin('WCGame', 'WCEntry.wc_game', '=', 'WCGame.seq')
			->select('WCEntry.*','WCGame.home_team_name','WCGame.home_team_image_file_name','WCGame.away_team_name','WCGame.away_team_image_file_name','WCGame.home_team_score as fin_home_score','WCGame.away_team_score as fin_away_score','WCGame.status')
			->get();
		}
		return view('web.contents.wcResult', [
			'title' => '竞猜结果',
			'data'  => $data,
		]);
	}
	protected function wechat_signature($timestamp,$nonceStr)
	{
		// $wechat_access_token = Cache::get('wechat_access_token');
		// if(!$wechat_access_token){
			$data['appid'] = env('WECHAT_GROUP_APP_ID', '');
			$data['secret'] = env('WECHAT_GROUP_APP_SECRET', '');
			$url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$data['appid'].'&secret='.$data['secret'];
			$result = json_decode(file_get_contents($url));
			if(isset($result->access_token)){
				Cache::put('wechat_access_token', $result->access_token, 120);
				$t_url = 'https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token='.$result->access_token.'&type=jsapi';
				$t_result = json_decode(file_get_contents($t_url));
				$wechat_access_ticket = $t_result->ticket;
				Cache::put('wechat_access_ticket', $t_result->ticket, 120);
				dd($t_result->ticket);
				$string = 'jsapi_ticket='.$wechat_access_ticket.'&noncestr='.$nonceStr.'&timestamp='.$timestamp.'&url='.'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
				$signature = sha1($string);
				return $signature;
			}
			else{
				return '';
			}
		// }else{
		// 	$wechat_access_ticket =  Cache::get('wechat_access_ticket');
		// 	$string = 'jsapi_ticket='.$wechat_access_ticket.'&noncestr='.$nonceStr.'&timestamp='.$timestamp.'&url='.'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		// 	$signature = sha1($string);
		// 	return $signature;
		// }
	}
}
