<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Request;
use Auth;
use App\Models\payment;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    static public function getSingle($id){
        return self::find($id);
    }
    static public function getEmailSingle($email){
       return User::where('email','=',$email)->first();
    }
    static public function getAdmin(){
        $return= self::select('users.*')
        ->where('is_deleted','=',0)
        ->where('user_type','=',4);
        if(!empty(Request::get('name'))){
            $return=$return->where('name','like','%'.Request::get('name').'%');  
        }
        if(!empty(Request::get('date'))){
            $return=$return->whereDate('created_at','=',Request::get('date'));  
        }
        if(!empty(Request::get('email'))){
            $return=$return->where('email','like','%'.Request::get('email').'%');  
        }
        $return=$return ->orderBy('id','desc')
        ->paginate(10);
        return $return;
    }
    static public function getTeacher_Branch(){
        $return= self::select('users.*')
        ->where('is_deleted','=',0)
        ->where('user_type','=',2)
        ->where('users.branch_id','=',Auth::user()->branch_id);
        if(!empty(Request::get('name'))){
            $return=$return->where('name','like','%'.Request::get('name').'%');  
        }
        if(!empty(Request::get('date'))){
            $return=$return->whereDate('created_at','=',Request::get('date'));  
        }
        if(!empty(Request::get('email'))){
            $return=$return->where('email','like','%'.Request::get('email').'%');  
        }
        $return=$return ->orderBy('id','desc')
        ->paginate(10);
        return $return;
    }
    static public function getTeacher(){
        $return= self::select('users.*')
        ->where('is_deleted','=',0)
        ->where('user_type','=',2);
        if(!empty(Request::get('name'))){
            $return=$return->where('name','like','%'.Request::get('name').'%');  
        }
        if(!empty(Request::get('date'))){
            $return=$return->whereDate('created_at','=',Request::get('date'));  
        }
        if(!empty(Request::get('email'))){
            $return=$return->where('email','like','%'.Request::get('email').'%');  
        }
        $return=$return ->orderBy('id','desc')
        ->paginate(10);
        return $return;
    }
    static public function getReceptionist(){
        $return= self::select('users.*')
        ->where('is_deleted','=',0)
        ->where('user_type','=',5);
        if(!empty(Request::get('name'))){
            $return=$return->where('name','like','%'.Request::get('name').'%');  
        }
        if(!empty(Request::get('date'))){
            $return=$return->whereDate('created_at','=',Request::get('date'));  
        }
        if(!empty(Request::get('email'))){
            $return=$return->where('email','like','%'.Request::get('email').'%');  
        }
        $return=$return ->orderBy('id','desc')
        ->paginate(10);
        return $return;
    }
    static public function getStudent(){
        $return= self::select('users.*','class.name as class_name')
        ->join('class','class.id','=','users.class_id','left')
        ->where('users.user_type','=',3)
        ->where('users.is_deleted','=',0)
        ->where('users.branch_id','=',Auth::user()->branch_id)
        ->orderBy('users.id','desc')
        ->paginate(10);
        return $return;
    }
    static public function getStudentCount(){
        $return= self::select('users.*','class.name as class_name')
        ->join('class','class.id','=','users.class_id','left')
        ->where('users.user_type','=',3)
        ->where('users.is_deleted','=',0)
        ->where('users.branch_id','=',Auth::user()->branch_id)
        ->count();
        return $return;
    }



    static public function getTry(){
        $return =Br_Fee::select('fee.*')
        ->where('is_deleted','=',0)
        ->where('status','=',0)
        ->count();
        return  $return;
    }
    static public function getAllStudent(){
        $return= self::select('users.*','class.name as class_name')
        ->join('class','class.id','=','users.class_id','left')
        ->where('users.user_type','=',3)
        ->where('users.is_deleted','=',0)
        ->orderBy('users.id','desc')
        ->paginate(10);
        return $return;
    }
    static public function getParticularStudent(){
        $return= self::select('users.*','class.name as class_name')
        ->join('class','class.id','=','users.class_id','left')
        ->where('users.user_type','=',3)
        ->where('users.is_deleted','=',0)
        ->where('users.id','=',Auth::user()->id)
        ->orderBy('users.id','desc')
        ->paginate(10);
        return $return;
    }
    static public function getStudentPayment(){
        $return= self::select('users.*','class.name as class_name')
        ->join('class','class.id','=','users.class_id','left')
        ->where('users.user_type','=',3)
        ->where('users.is_deleted','=',0)
        ->where('users.branch_id','=',Auth::user()->branch_id);
        if(!empty(Request::get('name')))
        {
            $return =$return->where('users.name','like',
            '%'.Request::get('name').'%'); 
        } 
        if(!empty(Request::get('last_name')))
        {
            $return =$return->where('users.last_name','like',
            '%'.Request::get('last_name').'%'); 
        } 
        if(!empty(Request::get('admission_number')))
        {
            $return =$return->where('users.admission_number','like',
            '%'.Request::get('last_name').'%'); 
        } 
        if(!empty(Request::get('status'))){
            $return=$return->where('users.status','=',Request::get('status'));  
        } 
        $return=$return ->orderBy('users.id','desc')
        ->paginate(10);
        return $return;
    }
    static public function getAllStudentPayment(){
        $return= self::select('users.*','class.name as class_name')
        ->join('class','class.id','=','users.class_id','left')
        ->where('users.user_type','=',3)
        ->where('users.is_deleted','=',0);
        if(!empty(Request::get('name')))
        {
            $return =$return->where('users.name','like',
            '%'.Request::get('name').'%'); 
        } 
        if(!empty(Request::get('last_name')))
        {
            $return =$return->where('users.last_name','like',
            '%'.Request::get('last_name').'%'); 
        } 
        if(!empty(Request::get('admission_number')))
        {
            $return =$return->where('users.admission_number','like',
            '%'.Request::get('last_name').'%'); 
        } 
        if(!empty(Request::get('status'))){
            $return=$return->where('users.status','=',Request::get('status'));  
        } 
        $return=$return ->orderBy('users.id','desc')
        ->paginate(10);
        return $return;
    }
    static public function getProspective(){
        $return= self::select('users.*','class.name as class_name')
        ->join('class','class.id','=','users.class_id','left')
        ->where('users.user_type','=',8)
        ->where('users.is_deleted','=',0)
        ->where('users.branch_id','=',Auth::user()->branch_id)
        ->orderBy('users.id','desc')
        ->paginate(10);
        return $return;
    }
    static public function getVisitor(){
        $return= self::select('users.*','class.name as class_name')
        ->join('class','class.id','=','users.class_id','left')
        ->where('users.user_type','=',7)
        ->where('users.is_deleted','=',0)
        ->where('users.branch_id','=',Auth::user()->branch_id)
        ->orderBy('users.id','desc')
        ->paginate(10);
        return $return;
    }
    static public function getParent(){
        $return= self::select('users.*','class.name as class_name')
        ->join('class','class.id','=','users.class_id','left')
        ->where('users.user_type','=',6)
        ->where('users.is_deleted','=',0)
        ->where('users.branch_id','=',Auth::user()->branch_id)
        ->orderBy('users.id','desc')
        ->paginate(10);
        return $return;
    }
    static public function getTokenSingle($remember_token){
        return User::where('remember_token','=',$remember_token)->first();
     }
     public function getprofile()
     {
        if(!empty($this->profile_pic) && file_exists('upload/profile/'.$this->profile_pic))
        {
             return url('upload/profile/'.$this->profile_pic);
        }
        else{
            return "";
        }
     }
     public function getPayment(){
        if(!empty($this->amount) )
        {
             return $this->amount;
        }
        else{
            return "";
        }
       
    }
    
}
