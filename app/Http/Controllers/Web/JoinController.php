<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JoinController extends Controller
{
  public function __construct()
  {
    $this->title = 'Main';
  }

  public function index()
  {
    return view('web.contents.join', [
        'title' => $this->title,
    ]);
  }
}
