<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    $sum = WCEntry::where('created_at','>',date("Y-m-d"))->distinct('phone_num')->count('phone_num');
    return view('web.contents.wc', [
        'title' => '竞猜',
        'data'  => $data,
        'sum'   => $sum
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
}
