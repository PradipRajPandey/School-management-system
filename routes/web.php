<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\backend\Setup\AssignSubjectController;
use App\Http\Controllers\backend\Setup\DesignationController;
use App\Http\Controllers\backend\Setup\ExamTypeController;
use App\Http\Controllers\backend\Setup\FeeAmountController;
use App\Http\Controllers\backend\Setup\FeeCategoryController;
use App\Http\Controllers\backend\Setup\SchoolSubjectController;
use App\Http\Controllers\backend\Setup\StudentClassController;
use App\Http\Controllers\backend\Setup\StudentGroupController;
use App\Http\Controllers\backend\Setup\StudentShfitController;
use App\Http\Controllers\backend\Setup\StudentYearContoller;
use App\Http\Controllers\backend\Student\StudentRegContoller;
use App\Http\Controllers\backend\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::get('/admin/logout',[AdminController::class,'Logout'])->name('admin.logout');

// user management all route


Route::prefix('user')->group(function(){
    Route::get('/view',[UserController::class,'UserView'])->name('user.view');

    Route::get('/add',[UserController::class,'UserAdd'])->name('user.add');

    Route::post('/store',[UserController::class,'UserStore'])->name('user.store');

    Route::get('/edit/{id}',[UserController::class,'UserEdit'])->name('user.edit');

  
    Route::post('/update/{id}',[UserController::class,'UserUpdate'])->name('user.update');

    Route::get('/delete/{id}',[UserController::class,'UserDelete'])->name('user.delete');
});

// user profile and change password
Route::prefix('profile')->group(function(){
    Route::get('/view',[ProfileController::class,'ProfileView'])->name('profile.view');
    Route::get('/edit',[ProfileController::class,'ProfileEdit'])->name('profile.edit');
    Route::post('/store',[ProfileController::class,'ProfileStore'])->name('profile.store');


    Route::get('/password/view',[ProfileController::class,'PasswordView'])->name('profilepassword.view');
    Route::post('/password/update',[ProfileController::class,'PasswordUpdate'])->name('profilepassword.update');



    
});

//  Setup management route
   
Route::prefix('setups')->group(function(){
     // student class route
    Route::get('/student/class/view',[StudentClassController::class,'StudentView'])->name('student.class.view');
    Route::get('/student/class/add',[StudentClassController::class,'StudentClassAdd'])->name('student.class.add');
    Route::post('/student/class/store',[StudentClassController::class,'StudentClassStore'])->name('student.class.store');
    Route::get('student/class/edit/{id}',[StudentClassController::class,'StudentClassEdit'])->name('student.class.edit');
    Route::post('student/class/update/{id}',[StudentClassController::class,'StudentClassUpdate'])->name('update.student.class');
    Route::get('student/class/delete/{id}',[StudentClassController::class,'StudentclassDelete'])->name('student.class.delete');

    // student year route
    Route::get('/student/year/view',[StudentYearContoller::class,'StudentYearView'])->name('student.year.view');
    Route::get('/student/year/add',[StudentYearContoller::class,'StudentYearAdd'])->name('student.year.add');
    Route::post('/student/year/store',[StudentYearContoller::class,'StudentYearStore'])->name('student.year.store');
    Route::get('student/year/edit/{id}',[StudentYearContoller::class,'StudentYearEdit'])->name('student.year.edit');
    Route::post('student/year/update/{id}',[StudentYearContoller::class,'StudentYearUpdate'])->name('update.student.year');
    Route::get('student/year/delete/{id}',[StudentYearContoller::class,'StudentYearDelete'])->name('student.year.delete');
    

    // student group route
    Route::get('/student/group/view',[StudentGroupController::class,'StudentGroupView'])->name('student.group.view');
    Route::get('/student/group/add',[StudentGroupController::class,'StudentGroupAdd'])->name('student.group.add');
    Route::post('/student/group/store',[StudentGroupController::class,'StudentGroupStore'])->name('student.group.store');
    Route::get('student/group/edit/{id}',[StudentGroupController::class,'StudentGroupEdit'])->name('student.group.edit');
    Route::post('student/group/update/{id}',[StudentGroupController::class,'StudentGroupUpdate'])->name('update.student.group');
    Route::get('student/group/delete/{id}',[StudentGroupController::class,'StudentGroupDelete'])->name('student.group.delete');
    

    // student shift route
    Route::get('/student/shfit/view',[StudentShfitController::class,'StudentShfitView'])->name('student.shfit.view');
    Route::get('/student/shfit/add',[StudentShfitController::class,'StudentShfitAdd'])->name('student.shfit.add');
    Route::post('/student/shfit/store',[StudentShfitController::class,'StudentShfitStore'])->name('student.shfit.store');
    Route::get('student/shfit/edit/{id}',[StudentShfitController::class,'StudentShfitEdit'])->name('student.shfit.edit');
    Route::post('student/shfit/update/{id}',[StudentShfitController::class,'StudentShfitUpdate'])->name('update.student.shfit');
    Route::get('student/shfit/delete/{id}',[StudentShfitController::class,'StudentShfitDelete'])->name('student.shfit.delete');

    // fee category route
    Route::get('/fee/category/view',[FeeCategoryController::class,'FeeCategoryView'])->name('fee.category.view');
    Route::get('/fee/category/add',[FeeCategoryController::class,'FeeCategoryAdd'])->name('fee.category.add');
    Route::post('/fee/category/store',[FeeCategoryController::class,'FeeCategoryStore'])->name('fee.category.store');
    Route::get('fee/category/edit/{id}',[FeeCategoryController::class,'FeeCategoryEdit'])->name('fee.category.edit');
    Route::post('fee/category/update/{id}',[FeeCategoryController::class,'FeeCategoryUpdate'])->name('update.fee.category');
    Route::get('fee/category/delete/{id}',[FeeCategoryController::class,'FeeCategoryDelete'])->name('fee.category.delete');

    // fee category amount route
    Route::get('/fee/amount/view',[FeeAmountController::class,'FeeAmountView'])->name('fee.amount.view');
    Route::get('/fee/amount/add',[FeeAmountController::class,'FeeAmountAdd'])->name('fee.amount.add');
    Route::post('/fee/amount/store',[FeeAmountController::class,'FeeAmountStore'])->name('fee.amount.store');
    Route::get('fee/amount/edit/{fee_category_id}',[FeeAmountController::class,'FeeAmountEdit'])->name('fee.amount.edit');
    Route::post('/fee/amount/update/{fee_category_id}',[FeeAmountController::class,'FeeAmountUpdate'])->name('update.fee.amount');
    Route::get('/fee/amount/details/{fee_category_id}',[FeeAmountController::class,'FeeAmountDetails'])->name('fee.amount.details');
    

    // Exam type route
    Route::get('/exam/type/view',[ExamTypeController::class,'ExamTypeView'])->name('exam.type.view');
    Route::get('/exam/type/add',[ExamTypeController::class,'ExamTypeAdd'])->name('exam.type.add');
    Route::post('/exam/type/store',[ExamTypeController::class,'ExamTypeStore'])->name('exam.type.store');
    Route::get('exam/type/edit/{id}',[ExamTypeController::class,'ExamTypeEdit'])->name('exam.type.edit');
    Route::post('exam/type/update/{id}',[ExamTypeController::class,'ExamTypeUpdate'])->name('update.exam.type');
    Route::get('exam/type/delete/{id}',[ExamTypeController::class,'ExamTypeDelete'])->name('exam.type.delete');

    // School Subject route
    Route::get('/school/subject/view',[SchoolSubjectController::class,'SchoolSubjectView'])->name('school.subject.view');
    Route::get('/school/subject/add',[SchoolSubjectController::class,'SchoolSubjectAdd'])->name('school.subject.add');
    Route::post('/school/subject/store',[SchoolSubjectController::class,'SchoolSubjectStore'])->name('school.subject.store');
    Route::get('school/subject/edit/{id}',[SchoolSubjectController::class,'SchoolSubjectEdit'])->name('school.subject.edit');
    Route::post('school/subject/update/{id}',[SchoolSubjectController::class,'SchoolSubjectUpdate'])->name('update.school.subject');
    Route::get('school/subject/delete/{id}',[SchoolSubjectController::class,'SchoolSubjectDelete'])->name('school.subject.delete');


     // Assign Subject route
    Route::get('/assign/subject/view',[AssignSubjectController::class,'AssignSubjectView'])->name('assign.subject.view');
    Route::get('/assign/subject/add',[AssignSubjectController::class,'AssignSubjectAdd'])->name('assign.subject.add');
    Route::post('/assign/subject/store',[AssignSubjectController::class,'AssignSubjectStore'])->name('assign.subject.store');
    Route::get('assign/subject/edit/{class_id}',[AssignSubjectController::class,'AssignSubjectEdit'])->name('assign.subject.edit');
    Route::post('/assign/subject/update/{class_id}',[AssignSubjectController::class,'AssignSubjectUpdate'])->name('update.assign.subject');
    Route::get('/assign/subject/details/{class_id}',[AssignSubjectController::class,'AssignSubjectDetails'])->name('assign.subject.details');


    // Designation route
    Route::get('/designation/view',[DesignationController::class,'DesignationView'])->name('designation.view');
    Route::get('/designation/add',[DesignationController::class,'DesignationAdd'])->name('designation.add');
    Route::post('/designation/store',[DesignationController::class,'DesignationStore'])->name('designation.store');
    Route::get('designation/edit/{id}',[DesignationController::class,'DesignationEdit'])->name('designation.edit');
    Route::post('designation/update/{id}',[DesignationController::class,'DesignationUpdate'])->name('update.designation');
    Route::get('designation/delete/{id}',[DesignationController::class,'DesignationDelete'])->name('designation.delete');
    

    
});  //end setup management route


 //  Student management route  

Route::prefix('students')->group(function(){
    // Student Registration route
    Route::get('/reg/view',[StudentRegContoller::class,'StudentRegView'])->name('student.registration.view');
    Route::get('/reg/add',[StudentRegContoller::class,'StudentRegAdd'])->name('student.registration.add');
    Route::post('/reg/store',[StudentRegContoller::class,'StudentRegStore'])->name('student.registration.store');
    



    
});  //end Student management route