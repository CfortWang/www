<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
  public function __construct()
  {
    $this->title = '产品介绍';
  }

  public function index()
  {
    return view('web.contents.product', [
        'title' => $this->title,
    ]);
  }
}
