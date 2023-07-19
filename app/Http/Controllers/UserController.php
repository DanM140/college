<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
class UserController extends Controller
{
    public function change_password()
    {
        return view('profile.change_password');
    }
    public function update_change_password(Request $request)
    {
      $user=User::getSingle(Auth::user()->id);
      if(Hash::check($request->old_password,$user->password))
      {
        $user->password= Hash::make($request->new_password);
        $user->save();
        return redirect()->back()
        ->with('success'," Password is successfully updated");
      }
      else
      {
         return redirect()->back()
         ->with('error',"Old Password is not correct");
      }
    }
    public function change_password_branch_admin()
    {
        return view('profile.change_password_branch_admin');
    }
    public function update_change_password_branch_admin(Request $request)
    {
      $user=User::getSingle(Auth::user()->id);
      if(Hash::check($request->old_password,$user->password))
      {
        $user->password= Hash::make($request->new_password);
        $user->save();
        return redirect()->back()
        ->with('success'," Password is successfully updated");
      }
      else
      {
         return redirect()->back()
         ->with('error',"Old Password is not correct");
      }
    }
    public function change_password_student()
    {
        return view('profile.change_password_student');
    }
    public function update_change_password_student(Request $request)
    {
      $user=User::getSingle(Auth::user()->id);
      if(Hash::check($request->old_password,$user->password))
      {
        $user->password= Hash::make($request->new_password);
        $user->save();
        return redirect()->back()
        ->with('success'," Password is successfully updated");
      }
      else
      {
         return redirect()->back()
         ->with('error',"Old Password is not correct");
      }
    }
    public function change_password_teacher()
    {
        return view('profile.change_password_teacher');
    }
    public function update_change_password_teacher(Request $request)
    {
      $user=User::getSingle(Auth::user()->id);
      if(Hash::check($request->old_password,$user->password))
      {
        $user->password= Hash::make($request->new_password);
        $user->save();
        return redirect()->back()
        ->with('success'," Password is successfully updated");
      }
      else
      {
         return redirect()->back()
         ->with('error',"Old Password is not correct");
      }
    }
    public function change_password_receptionist()
    {
        return view('profile.change_password_receptionist');
    }
    public function update_change_password_receptionist(Request $request)
    {
      $user=User::getSingle(Auth::user()->id);
      if(Hash::check($request->old_password,$user->password))
      {
        $user->password= Hash::make($request->new_password);
        $user->save();
        return redirect()->back()
        ->with('success'," Password is successfully updated");
      }
      else
      {
         return redirect()->back()
         ->with('error',"Old Password is not correct");
      }
    }


   
  }
