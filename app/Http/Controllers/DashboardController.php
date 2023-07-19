<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class DashboardController extends Controller
{
    public function dashboard(){
       if(Auth::user()->user_type==1){
            
            return view('admin.dashboard');
        }
        else if(Auth::user()->user_type==2){
            return view('teacher.dashboard');
            
        }
        else if(Auth::user()->user_type==3){
            return view('student.dashboard'); 
        }
        else if(Auth::user()->user_type==4){
            return view('branchadmin.dashboard');  
        }
        else if(Auth::user()->user_type==5){
            return view('receptionist.dashboard');  
        }
    }
    
}
