<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CareerController extends Controller
{
  public function __construct()
  {
    $this->title = '合伙人计划';
  }

  public function index()
  {
    return view('web.contents.career', [
        'title' => $this->title,
    ]);
  }
}
