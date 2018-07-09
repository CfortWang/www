<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Mail;

class MailController extends Controller
{
  public function __construct()
  {
  }

  public function index()
  {
    $name = '学院君';
    Mail::send('web.contents.mail.joinSuccess',['name'=>$name],function($message){
        $to = 'cfortwang@gmail.com';
        $message ->to($to)->subject('Seedo');
    });
    $flag = Mail::failures();
    if(empty($flag)){
        echo '发送邮件成功，请查收！';
    }else{
        echo '发送邮件失败，请重试！';
    }
  }
}
