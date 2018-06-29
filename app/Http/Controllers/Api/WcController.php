<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

use App\Models\WCGame;
use App\Models\WCEntry;

class WcController extends Controller
{
	public function __construct()
	{
		$this->title = '首页';
	}

	public function create(Request $request)
	{
		$post = Input::only([
			"home",
			"away",
			"name",
			"phone_num",]
		);
		$validator = Validator::make($post, [
			'home'    => 'required|array',
			'away'    => 'required|array',
			'name' => 'required|string|min:2|max:50',
			'phone_num' => 'required|string|min:2|max:50',
		]);
		if ($validator->fails()) {
			return $this->responseBadRequest('数据格式错误');
		} 

		foreach ($post['home'] as $key => $value) {
			$WCGame  = WCGame::where('seq',$key)->where('status','progress')->first();
			if($WCGame){
				$exist = WCEntry::where('wc_game',$key)->where('phone_num',$post['phone_num'])->first();
				if(!$exist){
					$sale_id = WCEntry::create([
						'phone_num' => $post['phone_num'],
						'name' => $post['name'],
						'home_team_score' => $post['home'][$key],
						'away_team_score' => $post['away'][$key],
						'wc_game' => $key,
					]);
				}else{
					$request->session()->put('wc_phone_num',$post['phone_num']);
					return $this->responseConflict('您已经提交过');
				}
			}else{
				return $this->responseConflict('数据未知');
			}
		}
		return $this->responseOk('成功');
	}
}
