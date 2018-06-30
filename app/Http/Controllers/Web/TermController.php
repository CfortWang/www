<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TermController extends Controller
{
    public function __construct()
    {
        $this->title = '首页';
    }

    public function protocol()
    {
        return view('web.contents.userProtocol', [
            'title' => '销售合伙人业务规则',
        ]);
    }
    public function guide(){
        return view('web.contents.userGuide', [
            'title' => '销售合伙人业务规则',
        ]);
    }

     public function event(){
        return view('web.contents.userEvent', [
            'title' => '活动',
        ]);
    }
  
}
