<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ClassSubjectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'AuthLogin']);
Route::get('logout', [AuthController::class, 'logout']);
Route::get('forgot-password', [AuthController::class, 'forgotpassword']);
Route::post('forgot-password', [AuthController::class, 'PostForgotPassword']);
Route::get('reset/{token}', [AuthController::class, 'reset']);
Route::post('reset/{token}', [AuthController::class, 'PostReset']);


Route::group(['middleware' => 'admin'], function() {

  // Admin Route
  Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
  Route::get('admin/admin/list', [AdminController::class, 'list']);
  Route::get('admin/admin/add', [AdminController::class, 'add']);
  Route::post('admin/admin/add', [AdminController::class, 'insert']);
  Route::get('admin/admin/edit/{id}', [AdminController::class, 'edit']);
  Route::post('admin/admin/edit/{id}', [AdminController::class, 'update']);
  Route::get('admin/admin/delete/{id}', [AdminController::class, 'delete']);

  //Student Route
  Route::get('admin/student/list', [StudentController::class, 'list']);
  Route::get('admin/student/add', [StudentController::class, 'add']);
  Route::post('admin/student/add', [StudentController::class, 'insert']);
  Route::get('admin/student/edit/{id}', [StudentController::class, 'edit']);
  Route::post('admin/student/edit/{id}', [StudentController::class, 'update']);
  Route::get('admin/student/delete/{id}', [StudentController::class, 'delete']);

  //Parent Route
  Route::get('admin/parent/list', [ParentController::class, 'list']);
  Route::get('admin/parent/add', [ParentController::class, 'add']);
  Route::post('admin/parent/add', [ParentController::class, 'insert']);
  Route::get('admin/parent/edit/{id}', [ParentController::class, 'edit']);
  Route::post('admin/parent/edit/{id}', [ParentController::class, 'update']);
  Route::get('admin/parent/delete/{id}', [ParentController::class, 'delete']);
  Route::get('admin/parent/my-student/{id}', [ParentController::class, 'myStudent']);
  Route::get('admin/parent/assign_student_parent/{student_id}/{parent_id}', [ParentController::class, 'assignStudentParent']);

  // Class Route
  Route::get('admin/class/list', [ClassController::class, 'list']);
  Route::get('admin/class/add', [ClassController::class, 'add']);
  Route::post('admin/class/add', [ClassController::class, 'insert']);
  Route::get('admin/class/edit/{id}', [ClassController::class, 'edit']);
  Route::post('admin/class/edit/{id}', [ClassController::class, 'update']);
  Route::get('admin/class/delete/{id}', [ClassController::class, 'delete']);

  // Subject route
  Route::get('admin/subject/list', [SubjectController::class, 'list']);
  Route::get('admin/subject/add', [SubjectController::class, 'add']);
  Route::post('admin/subject/add', [SubjectController::class, 'insert']);
  Route::get('admin/subject/edit/{id}', [SubjectController::class, 'edit']);
  Route::post('admin/subject/edit/{id}', [SubjectController::class, 'update']);
  Route::get('admin/subject/delete/{id}', [SubjectController::class, 'delete']);

  //Assign Subject route
  Route::get('admin/assign_subject/list', [ClassSubjectController::class, 'list']);
  Route::get('admin/assign_subject/add', [ClassSubjectController::class, 'add']);
  Route::post('admin/assign_subject/add', [ClassSubjectController::class, 'insert']);
  Route::get('admin/assign_subject/edit/{id}', [ClassSubjectController::class, 'edit']);
  Route::post('admin/assign_subject/edit/{id}', [ClassSubjectController::class, 'update']);
  Route::get('admin/assign_subject/edit_single/{id}', [ClassSubjectController::class, 'editSingle']);
  Route::post('admin/assign_subject/edit_single/{id}', [ClassSubjectController::class, 'updateSingle']);
  Route::get('admin/assign_subject/delete/{id}', [ClassSubjectController::class, 'delete']);

  // Change password Route
  Route::get('admin/change_password', [UserController::class, 'changePassword']);
  Route::post('admin/change_password', [UserController::class, 'updateChangePassword']);
    
});

Route::group(['middleware' => 'teacher'], function() {
  Route::get('teacher/dashboard', [DashboardController::class, 'dashboard']);

    // Change password Route
    Route::get('teacher/change_password', [UserController::class, 'changePassword']);
    Route::post('teacher/change_password', [UserController::class, 'updateChangePassword']);

});

Route::group(['middleware' => 'student'], function() {
  Route::get('student/dashboard', [DashboardController::class, 'dashboard']);

  // Change password Route
  Route::get('student/change_password', [UserController::class, 'changePassword']);
  Route::post('student/change_password', [UserController::class, 'updateChangePassword']);

});

Route::group(['middleware' => 'parent'], function() {
  Route::get('parent/dashboard', [DashboardController::class, 'dashboard']);

  // Change password Route
  Route::get('parent/change_password', [UserController::class, 'changePassword']);
  Route::post('parent/change_password', [UserController::class, 'updateChangePassword']);
});