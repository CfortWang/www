<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\SalesPartnerSignUp;

class JoinController extends Controller
{
  public function __construct()
  {
    $this->title = '加入喜豆大军';
  }

  public function index()
  {
    return view('web.contents.join', [
        'title' => $this->title,
    ]);
  }
  public function term()
  {
    return view('web.contents.joinTerm', [
        'title' => $this->title,
    ]);
  }

  public function payment(Request $request)
  {
    $seq = $request->session()->get('sale_id');
    $data = SalesPartnerSignUp::where('seq', $seq)->first();
    if($data->payment_status=='unpaid'){
      return view('web.contents.joinPayment', [
          'title' => $this->title,
      ]);
    }else{
      return view('web.contents.unionPaySuccess', [
        'title' => '支付成功',
        'total' => $data->payment_amount/100,
        'name' => $data->name,
      ]);
    }
  }
}
