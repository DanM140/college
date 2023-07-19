<?php

namespace App\Http\Controllers\branchadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Br_Notice_Controller extends Controller
{
public function NoticeBoard(){
    return view('branchadmin.communicate.notice.list '); 
}
public function AddNoticeBoard(){
    return view('branchadmin.communicate.notice.add'); 
}

}
