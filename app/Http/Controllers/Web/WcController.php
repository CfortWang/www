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
        'title' => '销售合伙人业务规则',
        'data'  => $data,
        'sum'   => $sum
    ]);
  }
}
