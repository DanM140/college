<?php

namespace App\Http\Controllers;
use Auth;
use Hash;
use App\Models\User;
use App\Mail\ForgotPasswordMail;
use Mail;
use Str;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        if(!empty(Auth::check())){
            if(Auth::user()->user_type==1){
                return redirect('admin/dashboard');
            }
            else if(Auth::user()->user_type==2){
                return redirect('teacher/dashboard');
            }
            else if(Auth::user()->user_type==3){
                return redirect('student/dashboard'); 
            }
            else if(Auth::user()->user_type==4){
                return redirect('branchadmin/dashboard');  
            }  
            else if(Auth::user()->user_type==5){
                return redirect('receptionist/dashboard');  
            }
        }
    return view('auth.login');    
    }
    public function Authlogin(Request $request ){
        $remember =!empty($request->remember)?true :false;
        if(Auth::attempt(['email'=>$request->email,
        'password'=>$request->password],$remember)) {
             if(Auth::user()->user_type==1){
                return redirect('admin/dashboard');
            }
            else if(Auth::user()->user_type==2){
                return redirect('teacher/dashboard');
            }
            else if(Auth::user()->user_type==3){
                return redirect('student/dashboard'); 
            }
            else if(Auth::user()->user_type==4){
                return redirect('branchadmin/dashboard');  
            }
            else if(Auth::user()->user_type==5){
                return redirect('receptionist/dashboard');  
            }
            
            
        }
        else{
            return redirect()->back()->with('error',
            'Please enter correct email and password');
        }
        }
        
        public function logout(){
              Auth::logout();
            return redirect(url(''));
        }
       
        public function forgotpassword(){
            return view('auth.forgot'); 
        }
        public function PostForgotPassword(Request $request){
            $user=User::getEmailSingle($request->email);
           if(!empty($user)){
            $user->remember_token = Str::random(30);
            $user->save();
            Mail::to($user->email)->send(new forgotpasswordMail($user));
            return redirect()->back()->with('Success',"Please check your email and reset password");
           }else{
            return redirect()->back()->with('error',"Email not found");
           }
        }
        public function reset($remember_token){
            $user=User::getTokenSingle($remember_token);
            if(!empty($user)){
                $data['user']=$user;
                return view('auth.reset',$data); 
            }
            else{
                abort(404);
            }
        
        }
        public function Postreset($token,Request $request){
            if($request->password==$request->confirm_password){
                $user=User::getTokenSingle($token);
                $user->password=Hash::make($request->password);
                $user->remember_token=Str::random(30);
                $user->save();
                return redirect(url(''))
                ->with('success',"Password successfully reset");
            }else{
                return redirect()->back()->with('error',
                "Password and confirm password does not match");  
            }
        }
}
