<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
  public function __construct()
  {
    $this->title = '首页';
  }

  public function index()
  {
    return view('web.contents.main', [
        'title' => $this->title,
    ]);
  }
}
