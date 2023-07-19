<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\Class_Subject_Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\FeeCertController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ReceptionistController;
use App\Http\Controllers\Teacher_SubjectController;
use App\Http\Controllers\receptionist\Re_StudentController;
use App\Http\Controllers\receptionist\Re_ProspectiveController;
use App\Http\Controllers\receptionist\Re_VisitorController;
use App\Http\Controllers\receptionist\Re_ParentController;
//branch
use App\Http\Controllers\branchadmin\Br_TeacherController;
use App\Http\Controllers\branchadmin\Br_Class_Subject_Controller;
use App\Http\Controllers\branchadmin\Br_ClassController;
use App\Http\Controllers\branchadmin\Br_DepartmentController;
use App\Http\Controllers\branchadmin\Br_Room_Controller;
use App\Http\Controllers\branchadmin\Br_Period_Controller;
use App\Http\Controllers\branchadmin\Br_PaymentController;
use App\Http\Controllers\branchadmin\Br_StudentController;
use App\Http\Controllers\branchadmin\Br_SubjectController;
use App\Http\Controllers\branchadmin\Br_Teacher_SubjectController;
use App\Http\Controllers\branchadmin\Br_Class_Timetable_Controller;
use App\Http\Controllers\branchadmin\Br_Exam_Timetable_Controller;
use App\Http\Controllers\branchadmin\Br_Notice_Controller;
//student
use App\Http\Controllers\student\Student_Class_Subject_Controller;
use App\Http\Controllers\student\St_PaymentController;
use App\Http\Controllers\student\St_ResultController;
use App\Http\Controllers\student\St_ReportController;
//teacher
use App\Http\Controllers\teacher\T_TeacherController;
use App\Http\Controllers\teacher\T_Student_MarksController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
    //return view('welcome');
//});
Route::get('/',[AuthController::class,'login']);
Route::post('/login',[AuthController::class,'Authlogin']);
Route::get('/logout',[AuthController::class,'logout']);
Route::get('/forgot-password',[AuthController::class,'forgotpassword']);
Route::post('/forgot-password',[AuthController::class,'PostForgotPassword']);
Route::get('/reset/{token}',[AuthController::class,'reset']);
Route::post('/reset/{token}',[AuthController::class,'Postreset']);
Route::get('/admin/admin/list', function () {
    return view('admin.admin.list');
});

Route::group(['middleware'=>'admin'],function(){
    Route::get('/admin/dashboard',[DashboardController::class,'dashboard']);
    Route::get('/admin/payment/totalpay/{id}',[PaymentController::class,'totalpay']);
    //admin
    Route::get('/admin/admin/list',[AdminController::class,'list']);
    Route::get('/admin/admin/add',[AdminController::class,'add']);
    Route::post('/admin/admin/add',[AdminController::class,'insert']);
    Route::get('/admin/admin/edit/{id}',[AdminController::class,'edit']);
    Route::post('/admin/admin/edit/{id}',[AdminController::class,'update']);
    Route::get('/admin/admin/delete/{id}',[AdminController::class,'delete']);
    //teacher
    Route::get('/admin/teacher/list',[TeacherController::class,'list']);
    Route::get('/admin/teacher/add',[TeacherController::class,'add']);
    Route::post('/admin/teacher/add',[TeacherController::class,'insert']);
    Route::get('/admin/teacher/edit/{id}',[TeacherController::class,'edit']);
    Route::post('/admin/teacher/edit/{id}',[TeacherController::class,'update']);
    Route::get('/admin/teacher/delete/{id}',[TeacherController::class,'delete']);
     //receptionist
     Route::get('/admin/receptionist/list',[ReceptionistController::class,'list']);
     Route::get('/admin/receptionist/add',[ReceptionistController::class,'add']);
     Route::post('/admin/receptionist/add',[ReceptionistController::class,'insert']);
     Route::get('/admin/receptionist/edit/{id}',[ReceptionistController::class,'edit']);
     Route::post('/admin/receptionist/edit/{id}',[ReceptionistController::class,'update']);
     Route::get('/admin/receptionist/delete/{id}',[ReceptionistController::class,'delete']);
   //student
   Route::get('/admin/student/list',[StudentController::class,'list']);
   Route::get('/admin/student/add',[StudentController::class,'add']);
   Route::post('/admin/student/add',[StudentController::class,'insert']);
   Route::get('/admin/student/edit/{id}',[StudentController::class,'edit']);
   Route::post('/admin/student/edit/{id}',[StudentController::class,'update']);
   Route::get('/admin/student/delete/{id}',[StudentController::class,'delete']);
   //dropdown

Route::post('/admin/student/api/fetch-classes', [StudentController::class, 'fetchClass']);
Route::post('/admin/student/api/fetch-fees', [StudentController::class, 'fetchFee']);
 //dropdown

 Route::post('/admin/subject/api/fetch-classes', [SubjectController::class, 'fetchClass']);
 Route::post('/admin/subject/api/fetch-fees', [SubjectController::class, 'fetchFee']);

    //class
    Route::get('/admin/class/list',[ClassController::class,'list']);
    Route::get('/admin/class/add',[ClassController::class,'add']);
    Route::post('/admin/class/add',[ClassController::class,'insert']);
    Route::get('/admin/class/edit/{id}',[ClassController::class,'edit']);
    Route::post('/admin/class/edit/{id}',[ClassController::class,'update']);
    Route::get('/admin/class/delete/{id}',[ClassController::class,'delete']);
    //certificate fee
    Route::get('/admin/cert/list',[FeeCertController::class,'list']);
    Route::get('/admin/cert/add',[FeeCertController::class,'add']);
    Route::post('/admin/cert/add',[FeeCertController::class,'insert']);
    Route::get('/admin/cert/edit/{id}',[FeeCertController::class,'edit']);
    Route::post('/admin/cert/edit/{id}',[FeeCertController::class,'update']);
    Route::get('/admin/cert/delete/{id}',[FeeCertController::class,'delete']);
     //Diploma Fee
     Route::get('/admin/fee/list',[FeeController::class,'list']);
     Route::get('/admin/fee/add',[FeeController::class,'add']);
     Route::post('/admin/fee/add',[FeeController::class,'insert']);
     Route::get('/admin/fee/edit/{id}',[FeeController::class,'edit']);
     Route::post('/admin/fee/edit/{id}',[FeeController::class,'update']);
     Route::get('/admin/fee/delete/{id}',[FeeController::class,'delete']);
    //subject
    Route::get('/admin/subject/list',[SubjectController::class,'list']);
    Route::get('/admin/subject/add',[SubjectController::class,'add']);
    Route::post('/admin/subject/add',[SubjectController::class,'insert']);
    Route::get('/admin/subject/edit/{id}',[SubjectController::class,'edit']);
    Route::post('/admin/subject/edit/{id}',[SubjectController::class,'update']);
    Route::get('/admin/subject/delete/{id}',[SubjectController::class,'delete']);
     //Branch
     Route::get('/admin/branch/list',[BranchController::class,'list']);
     Route::get('/admin/branch/add',[BranchController::class,'add']);
     Route::post('/admin/branch/add',[BranchController::class,'insert']);
     Route::get('/admin/branch/edit/{id}',[BranchController::class,'edit']);
     Route::post('/admin/branch/edit/{id}',[BranchController::class,'update']);
     Route::get('/admin/branch/delete/{id}',[BranchController::class,'delete']);
     //Payments
     Route::get('/admin/payment/list',[PaymentController::class,'list']);
     Route::get('/admin/payment/pay_aggregate',[PaymentController::class,'pay_aggregate']);
     Route::get('/admin/payment/add',[PaymentController::class,'add']);
     Route::post('/admin/payment/add',[PaymentController::class,'insert']);
     Route::get('/admin/payment/paymentlist',[PaymentController::class,'paymentlist']);
     
     Route::get('admin/payment/payment/{id}/{term}',[PaymentController::class,'payment'])->name('admin.payment.payment');
     Route::post('admin/payment/payment/{id}/{term}',[PaymentController::class,'save'])->name('admin.payment.payment');

     Route::get('/admin/payment/mpesa/{id}',[PaymentController::class,'mpesa']);
     Route::post('/admin/payment/mpesa/{id}',[PaymentController::class,'mpesasave']);
     Route::get('admin/payment/bank/{id}/{term}',[PaymentController::class,'bank'])->name('admin.payment.bank');
     Route::post('admin/payment/bank/{id}/{term}',[PaymentController::class,'banksave'])->name('admin.payment.bank');
     Route::get('admin/payment/mpesa/{id}/{term}',[PaymentController::class,'mpesa'])->name('admin.payment.mpesa');
     Route::post('admin/payment/mpesa/{id}/{term}',[PaymentController::class,'mpesasave'])->name('admin.payment.mpesa');
     Route::get('/admin/payment/edit/{id}',[PaymentController::class,'edit']);
     Route::post('/admin/payment/edit/{id}',[PaymentController::class,'update']);
     Route::get('/admin/payment/delete/{id}',[PaymentController::class,'delete']);
      //Department
    Route::get('/admin/department/list',[DepartmentController::class,'list']);
    Route::get('/admin/department/add',[DepartmentController::class,'add']);
    Route::post('/admin/department/add',[DepartmentController::class,'insert']);
    Route::get('/admin/department/edit/{id}',[DepartmentController::class,'edit']);
    Route::post('/admin/department/edit/{id}',[DepartmentController::class,'update']);
    Route::get('/admin/department/delete/{id}',[DepartmentController::class,'delete']);
    
    //assign_subject
    Route::get('/admin/assign_subject/list',[Class_Subject_Controller::class,'list']);
    Route::get('/admin/assign_subject/add',[Class_Subject_Controller::class,'add']);
    Route::post('/admin/assign_subject/add',[Class_Subject_Controller::class,'insert']);
    Route::get('/admin/assign_subject/edit/{id}',[Class_Subject_Controller::class,'edit']);
    Route::post('/admin/assign_subject/edit/{id}',[Class_Subject_Controller::class,'update']);
    Route::get('/admin/assign_subject/delete/{id}',[Class_Subject_Controller::class,'delete']);
    Route::get('/admin/assign_subject/edit_single/{id}',[Class_Subject_Controller::class,'edit_single']);
    Route::post('/admin/assign_subject/edit_single/{id}',[Class_Subject_Controller::class,'update_single']);
     //assign_teacher
     Route::get('/admin/assign_teacher/list',[Teacher_SubjectController::class,'list']);
     Route::get('/admin/assign_teacher/add',[Teacher_SubjectController::class,'add']);
     Route::post('/admin/assign_teacher/add',[Teacher_SubjectController::class,'insert']);
     Route::get('/admin/assign_teacher/edit/{id}',[Teacher_SubjectController::class,'edit']);
     Route::post('/admin/assign_teacher/edit/{id}',[Teacher_SubjectController::class,'update']);
     Route::get('/admin/assign_teacher/delete/{id}',[Teacher_SubjectController::class,'delete']);
     Route::get('/admin/assign_teacher/edit_single/{id}',[Teacher_SubjectController::class,'edit_single']);
     Route::post('/admin/assign_teacher/edit_single/{id}',[Teacher_SubjectController::class,'update_single']);
//change password
    Route::get('/admin/change_password',[UserController::class,'change_password']);
    Route::post('/admin/change_password',[UserController::class,'update_change_password']);    
});

/**
 * branch admin
 */


Route::group(['middleware'=>'branchadmin'],function(){
    Route::get('/branchadmin/dashboard',[DashboardController::class,'dashboard']);
   //student
   Route::get('/branchadmin/student/list',[Br_StudentController::class,'list']);
   Route::get('/branchadmin/student/add',[Br_StudentController::class,'add']);
   Route::post('/branchadmin/student/add',[Br_StudentController::class,'insert']);
   Route::get('/branchadmin/student/edit/{id}',[Br_StudentController::class,'edit']);
   Route::post('/branchadmin/student/edit/{id}',[Br_StudentController::class,'update']);
   Route::get('/branchadmin/student/delete/{id}',[Br_StudentController::class,'delete']);
    //teacher
    Route::get('/branchadmin/teacher/list',[Br_TeacherController::class,'list']);
    Route::get('/branchadmin/teacher/add',[Br_TeacherController::class,'add']);
    Route::post('/branchadmin/teacher/add',[Br_TeacherController::class,'insert']);
    Route::get('/branchadmin/teacher/edit/{id}',[Br_TeacherController::class,'edit']);
    Route::post('/branchadmin/teacher/edit/{id}',[Br_TeacherController::class,'update']);
    Route::get('/branchadmin/teacher/delete/{id}',[Br_TeacherController::class,'delete']);
   //dropdown

Route::post('/branchadmin/student/api/fetch-classes', [Br_StudentController::class, 'fetchClass']);
Route::post('/branchadmin/student/api/fetch-fees', [Br_StudentController::class, 'fetchFee']);
//f
Route::post('/branchadmin/subject/api/fetch-subjects_Subject', [Br_SubjectController::class, 'fetchClass_Subject']);
    //class
    Route::get('/branchadmin/class/list',[Br_ClassController::class,'list']);
    Route::get('/branchadmin/class/add',[Br_ClassController::class,'add']);
    Route::post('/branchadmin/class/add',[Br_ClassController::class,'insert']);
    Route::get('/branchadmin/class/edit/{id}',[Br_ClassController::class,'edit']);
    Route::post('/branchadmin/class/edit/{id}',[Br_ClassController::class,'update']);
    Route::get('/branchadmin/class/delete/{id}',[Br_ClassController::class,'delete']);
   
    //subject
    Route::get('/branchadmin/subject/list',[Br_SubjectController::class,'list']);
    Route::get('/branchadmin/subject/add',[Br_SubjectController::class,'add']);
    Route::post('/branchadmin/subject/add',[Br_SubjectController::class,'insert']);
    Route::get('/branchadmin/subject/edit/{id}',[Br_SubjectController::class,'edit']);
    Route::post('/branchadmin/subject/edit/{id}',[Br_SubjectController::class,'update']);
    Route::get('/branchadmin/subject/delete/{id}',[Br_SubjectController::class,'delete']);

     //Payments
     Route::get('/branchadmin/payment/list',[Br_PaymentController::class,'list']);
     Route::get('/branchadmin/payment/pay_aggregate',[Br_PaymentController::class,'pay_aggregate']);
     
     Route::get('/branchadmin/payment/add',[Br_PaymentController::class,'add']);
     Route::post('/branchadmin/payment/add',[Br_PaymentController::class,'insert']);
     Route::get('/branchadmin/payment/paymentlist',[Br_PaymentController::class,'paymentlist']);
     Route::get('/branchadmin/payment/payment/{id}',[Br_PaymentController::class,'payment']);
     Route::post('/branchadmin/payment/payment/{id}',[Br_PaymentController::class,'save']);
     Route::get('/branchadmin/payment/payment/{id}/{term}',[Br_PaymentController::class,'payment'])->name('branchadmin.payment.payment');
     Route::post('/branchadmin/payment/payment/{id}/{term}',[Br_PaymentController::class,'save'])->name('branchadmin.payment.payment');
     Route::get('/branchadmin/payment/bank/{id}/{term}',[Br_PaymentController::class,'bank'])->name('branchadmin.payment.bank');
     Route::post('/branchadmin/payment/bank/{id}/{term}',[Br_PaymentController::class,'banksave'])->name('branchadmin.payment.bank');
     Route::get('/branchadmin/payment/mpesa/{id}/{term}',[Br_PaymentController::class,'mpesa'])->name('branchadmin.payment.mpesa');
     Route::post('/branchadmin/payment/mpesa/{id}/{term}',[Br_PaymentController::class,'mpesasave'])->name('branchadmin.payment.mpesa');
     Route::get('/branchadmin/payment/edit/{id}',[Br_PaymentController::class,'edit']);
     Route::get('/branchadmin/payment/totalpay/{id}',[Br_PaymentController::class,'totalpay']);
     Route::post('/branchadmin/payment/edit/{id}',[Br_PaymentController::class,'update']);
     Route::get('/branchadmin/payment/delete/{id}',[Br_PaymentController::class,'delete']);

      //Department
    Route::get('/branchadmin/department/list',[Br_DepartmentController::class,'list']);
    Route::get('/branchadmin/department/add',[Br_DepartmentController::class,'add']);
    Route::post('/branchadmin/department/add',[Br_DepartmentController::class,'insert']);
    Route::get('/branchadmin/department/edit/{id}',[Br_DepartmentController::class,'edit']);
    Route::post('/branchadmin/department/edit/{id}',[Br_DepartmentController::class,'update']);
    Route::get('/branchadmin/department/delete/{id}',[Br_DepartmentController::class,'delete']);
     //Room
     Route::get('/branchadmin/room/list',[Br_Room_Controller::class,'list']);
     Route::get('/branchadmin/room/add',[Br_Room_Controller::class,'add']);
     Route::post('/branchadmin/room/add',[Br_Room_Controller::class,'insert']);
     Route::get('/branchadmin/room/edit/{id}',[Br_Room_Controller::class,'edit']);
     Route::post('/branchadmin/room/edit/{id}',[Br_Room_Controller::class,'update']);
     Route::get('/branchadmin/room/delete/{id}',[Br_Room_Controller::class,'delete']);
     //Period
     Route::get('/branchadmin/period/list',[Br_Period_Controller::class,'list']);
     Route::get('/branchadmin/period/add',[Br_Period_Controller::class,'add']);
     Route::post('/branchadmin/period/add',[Br_Period_Controller::class,'insert']);
     Route::get('/branchadmin/period/edit/{id}',[Br_Period_Controller::class,'edit']);
     Route::post('/branchadmin/period/edit/{id}',[Br_Period_Controller::class,'update']);
     Route::get('/branchadmin/period/delete/{id}',[Br_Period_Controller::class,'delete']);
    
    //assign_subject
    Route::get('/branchadmin/assign_subject/list',[Br_Class_Subject_Controller::class,'list']);
    Route::get('/branchadmin/assign_subject/add',[Br_Class_Subject_Controller::class,'add']);
    Route::post('/branchadmin/assign_subject/add',[Br_Class_Subject_Controller::class,'insert']);
    Route::get('/branchadmin/assign_subject/edit/{id}',[Br_Class_Subject_Controller::class,'edit']);
    Route::post('/branchadmin/assign_subject/edit/{id}',[Br_Class_Subject_Controller::class,'update']);
    Route::get('/branchadmin/assign_subject/delete/{id}',[Br_Class_Subject_Controller::class,'delete']);
    Route::get('/branchadmin/assign_subject/edit_single/{id}',[Br_Class_Subject_Controller::class,'edit_single']);
    Route::post('/branchadmin/assign_subject/edit_single/{id}',[Br_Class_Subject_Controller::class,'update_single']);
   
   
    
     //assign_teacher
     Route::get('/branchadmin/assign_teacher/list',[Br_Teacher_SubjectController::class,'list']);
     Route::get('/branchadmin/assign_teacher/add',[Br_Teacher_SubjectController::class,'add']);
     Route::post('/branchadmin/assign_teacher/add',[Br_Teacher_SubjectController::class,'insert']);
     Route::get('/branchadmin/assign_teacher/edit/{id}',[Br_Teacher_SubjectController::class,'edit']);
     Route::post('/branchadmin/assign_teacher/edit/{id}',[Br_Teacher_SubjectController::class,'update']);
     Route::get('/branchadmin/assign_teacher/delete/{id}',[Br_Teacher_SubjectController::class,'delete']);
     Route::get('/branchadmin/assign_teacher/edit_single/{id}',[Br_Teacher_SubjectController::class,'edit_single']);
     Route::post('/branchadmin/assign_teacher/edit_single/{id}',[Br_Teacher_SubjectController::class,'update_single']);


     //create timetable
     Route::get('/branchadmin/class_timetable/list',[Br_Class_Timetable_Controller::class,'list']);//courses
     Route::get('/branchadmin/class_timetable/timetable',[Br_Class_Timetable_Controller::class,'timetable']);//timetable
     Route::get('/branchadmin/class_timetable/get_subject/{id}',[Br_Class_Timetable_Controller::class,'get']);
    Route::get('/branchadmin/class_timetable/get_subject/{id}',[Br_Class_Timetable_Controller::class,'add']);
     Route::post('/branchadmin/class_timetable/get_subject/{id}',[Br_Class_Timetable_Controller::class,'insert']);
     Route::get('/branchadmin/class_timetable/edit/{id}/{class_id}',[Br_Class_Timetable_Controller::class,'edit'])->name('branchadmin.class_timetable.edit');
     Route::post('/branchadmin/class_timetable/edit/{id}/{class_id}',[Br_Class_Timetable_Controller::class,'update'])->name('branchadmin.class_timetable.update');
     Route::get('/branchadmin/class_timetable/room', [Br_Class_Timetable_Controller::class,'roomsearch']);

    Route::get('/branchadmin/class_timetable/delete/{id}',[Br_Class_Timetable_Controller::class,'delete']);
     //create exam timetable
     Route::get('/branchadmin/exam_timetable/list',[Br_Exam_Timetable_Controller::class,'list']);//courses
     Route::get('/branchadmin/exam_timetable/timetable',[Br_Exam_Timetable_Controller::class,'timetable']);//timetable
     Route::get('/branchadmin/exam_timetable/get_subject/{id}',[Br_Exam_Timetable_Controller::class,'get']);
     Route::get('/branchadmin/exam_timetable/get_subject/{id}',[Br_Exam_Timetable_Controller::class,'add']);
     Route::post('/branchadmin/exam_timetable/get_subject/{id}',[Br_Exam_Timetable_Controller::class,'insert']);
     Route::get('/branchadmin/exam_timetable/edit/{id}/{class_id}',[Br_Exam_Timetable_Controller::class,'edit'])->name('branchadmin.exam_timetable.edit');
     Route::post('/branchadmin/exam_timetable/edit/{id}/{class_id}',[Br_Exam_Timetable_Controller::class,'update'])->name('branchadmin.exam_timetable.update');
     Route::get('/branchadmin/exam_timetable/room', [Br_Exam_Timetable_Controller::class,'roomsearch']);
     Route::get('/branchadmin/class_timetable/delete/{id}',[Br_Exam_Timetable_Controller::class,'delete']);
     //noticeboard
     Route::get('/branchadmin/communicate/notice', [ Br_Notice_Controller::class,'NoticeBoard']);
     Route::get('branchadmin/communicate/notice/add', [ Br_Notice_Controller::class,'AddNoticeBoard']);
    
//change password
    Route::get('/branchadmin/change_password_branch_admin',[UserController::class,'change_password_branch_admin']);
    Route::post('/branchadmin/change_password_branch_admin',[UserController::class,'update_change_password_branch_admin']);



    
});
Route::group(['middleware'=>'teacher'],function(){
    Route::get('/teacher/dashboard',[DashboardController::class,'dashboard']);
    Route::get('/teacher/subject',[T_TeacherController::class,'list']);
    Route::get('/teacher/students',[T_TeacherController::class,'students']);
    Route::get('teacher/student/{class_id}/{subject_id}',[T_TeacherController::class,'student'])->name('teacher.student');
    //marks
    Route::get('/teacher/marks_list',[T_Student_MarksController::class,'marks_list']);
    Route::get('teacher/marks/{student_id}/{subject_id}/{class_id}',[T_Student_MarksController::class,'add_marks'])->name('teacher.marks');
    Route::post('teacher/marks/{student_id}/{subject_id}/{class_id}',[T_Student_MarksController::class,'insert'])->name('teacher.marks');
    Route::get('teacher/edit_marks/{id}',[T_Student_MarksController::class,'edit']);
    Route::post('teacher/edit_marks/{id}',[T_Student_MarksController::class,'update']);
    Route::get('/teacher/delete/{id}',[T_Student_MarksController::class,'delete']);
    //change password
    Route::get('/teacher/change_password_teacher',[UserController::class,'change_password_teacher']);
    Route::post('/teacher/change_password_teacher',[UserController::class,'update_change_password_teacher']);
    
}); 


Route::group(['middleware'=>'receptionist'],function(){
    Route::get('/receptionist/dashboard',[DashboardController::class,'dashboard']);
    //student
   Route::get('/receptionist/student/list',[Re_StudentController::class,'list']);
   Route::get('/receptionist/student/add',[Re_StudentController::class,'add']);
   Route::post('/receptionist/student/add',[Re_StudentController::class,'insert']);
   Route::get('/receptionist/student/edit/{id}',[Re_StudentController::class,'edit']);
   Route::post('/receptionist/student/edit/{id}',[Re_StudentController::class,'update']);
   Route::get('/receptionist/student/delete/{id}',[Re_StudentController::class,'delete']);
    //prospective
    Route::get('/receptionist/prospective/list',[Re_ProspectiveController::class,'list']);
    Route::get('/receptionist/prospective/add',[Re_ProspectiveController::class,'add']);
    Route::post('/receptionist/prospective/add',[Re_ProspectiveController::class,'insert']);
    Route::get('/receptionist/prospective/edit/{id}',[Re_ProspectiveController::class,'edit']);
    Route::post('/receptionist/prospective/edit/{id}',[Re_ProspectiveController::class,'update']);
    Route::get('/receptionist/prospective/delete/{id}',[Re_ProspectiveController::class,'delete']);
     //visitor
     Route::get('/receptionist/visitor/list',[Re_VisitorController::class,'list']);
     Route::get('/receptionist/visitor/add',[Re_VisitorController::class,'add']);
     Route::post('/receptionist/visitor/add',[Re_VisitorController::class,'insert']);
     Route::get('/receptionist/visitor/edit/{id}',[Re_VisitorController::class,'edit']);
     Route::post('/receptionist/visitor/edit/{id}',[Re_VisitorController::class,'update']);
     Route::get('/receptionist/visitor/delete/{id}',[Re_VisitorController::class,'delete']);
     //parent
      Route::get('/receptionist/parent/list',[Re_ParentController::class,'list']);
      Route::get('/receptionist/parent/parent',[Re_ParentController::class,'parent']);
      Route::get('/receptionist/parent/add/{id}',[Re_ParentController::class,'add']);
      Route::post('/receptionist/parent/add/{id}',[Re_ParentController::class,'insert']);
      Route::get('/receptionist/parent/edit/{id}',[Re_ParentController::class,'edit']);
      Route::post('/receptionist/parent/edit/{id}',[Re_ParentController::class,'update']);
      Route::get('/receptionist/parent/delete/{id}',[Re_ParentController::class,'delete']);
   
    //
    Route::post('/receptionist/student/api/fetch-classes', [Re_StudentController::class, 'fetchClass']);
    Route::post('/receptionist/student/api/fetch-fees', [Re_StudentController::class, 'fetchFee']);

    //change password
    Route::get('/receptionist/change_password_receptionist',[UserController::class,'change_password_receptionist']);
    Route::post('/receptionist/change_password_receptionist',[UserController::class,'update_change_passwordreceptionist']);
    
});

Route::group(['middleware'=>'student'],function(){
    Route::get('/student/dashboard',[DashboardController::class,'dashboard']);
    //dropdown

Route::post('/student/student/api/fetch-classes', [StudentController::class, 'fetchClass']);
Route::post('/student/student/api/fetch-fees', [StudentController::class, 'fetchFee']);
    //assign_subject
    Route::get('/student/assign_subject/list',[Student_Class_Subject_Controller::class,'list']);
    Route::get('/student/assign_subject/add',[Student_Class_Subject_Controller::class,'add']);
    Route::post('/student/assign_subject/add',[Student_Class_Subject_Controller::class,'insert']);
//payments
Route::get('/student/payment/pay_aggregate',[St_PaymentController::class,'pay_aggregate']);
//Route::get('/student/payment/pay_aggregate',[St_PaymentController::class,'pay_status']);

//results
Route::get('/student/list',[St_ResultController::class,'list']);
//register for current sem
Route::get('/student/report',[St_ReportController::class,'report']);
Route::get('/student/edit_report/{id}',[St_ReportController::class,'edit']);
Route::post('/student/edit_report/{id}',[St_ReportController::class,'update']);
    //change password
    Route::get('/student/change_password_student',[UserController::class,'change_password_student']);
    Route::post('/student/change_password_student',[UserController::class,'update_change_password_student']);

});

