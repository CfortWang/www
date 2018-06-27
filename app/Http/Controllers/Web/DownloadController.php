<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DownloadController extends Controller
{
  public function __construct()
  {
    $this->title = '下载';
  }

  public function spapp()
  {
    return response()->download(storage_path('app/public/seedo_spapp.apk'));
  }
}
