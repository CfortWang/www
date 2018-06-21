<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

  public function payment()
  {
    return view('web.contents.joinPayment', [
        'title' => $this->title,
    ]);
  }
}
