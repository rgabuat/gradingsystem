<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\DataImportController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CompanyController;


use App\Http\Controllers\classlist\student\ClasslistsController;
use App\Http\Controllers\classlist\student\StudentController;
use App\Http\Controllers\subject\SubjectController;
use App\Http\Controllers\member\MemberController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\GradebookController;
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
    return view('auth/login');
})->name('/');

// Route::get('login', function () {
//     return view('auth/login');
// });

Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/logout', [LogoutController::class, 'store'])->name('logout');

// Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
Route::post('/changePassword', [ChangePasswordController::class, 'changePasswordPost'])->name('changePassword');


Route::group(['middleware' => 'auth'],function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/change-password', [ChangePasswordController::class, 'showChangePasswordGet'])->name('change-password');
    Route::get('/view-profile', [ProfileController::class, 'index'])->name('view-profile');
    Route::get('/edit-profile', [ProfileController::class, 'edit'])->name('edit-profile');
    Route::post('/update-profile/{uid}', [ProfileController::class, 'update'])->name('update-profile/{uid}');

    Route::group(['prefix' => 'Classlists'],function(){
        Route::get('/lists', [ClasslistsController::class,'index'])->name('classlists/lists');
        Route::get('/import-class', [ClasslistsController::class,'preview_import'])->name('classlists/import-class');
        Route::get('/add-student', [ClasslistsController::class,'create'])->name('classlists/add-student');
        Route::get('lists/search/', [SearchController::class,'search'])->name('Classlists/lists/search');
        Route::get('lists/filter/', [SearchController::class,'search'])->name('Classlists/lists/filter');
        Route::get('/student/modify/{sid}', [StudentController::class,'edit'])->name('Classlists/student/modify/{sid}');
        Route::get('/student/subjects/{id}', [StudentController::class,'get_subjects'])->name('Classlists/student/subjects/{id}');
        Route::get('/student/course/modify/{id}', [StudentController::class,'add_course'])->name('Classlists/student/course/{id}');
        Route::get('/students', [ClasslistsController::class,'students'])->name('classlists/students');
        Route::get('/student/{sid}/add-subject', [ClasslistsController::class,'add_subjects'])->name('classlists/student/{sid}/add-subject');
        Route::post('/student/{sid}/add-subject', [ClasslistsController::class,'store_subjects'])->name('classlists/student/{sid}/add-subject');
        Route::post('/student/{sid}/add-subject', [ClasslistsController::class,'store_subjects'])->name('classlists/student/{sid}/add-subject');

        //for instructor role only
        Route::group(['middleware' => ['role:faculty']], function () {
            Route::get('/my-class', [ClasslistsController::class,'myClass'])->name('Classlists/my-class');
            Route::get('/my-class/{cid}/students', [ClasslistsController::class,'classStudents'])->name('Classlists/my-class/{cid}/students');
        });

        

    });

    Route::group(['prefix' => 'grading-setup'],function(){
        Route::get('/category', [GradebookController::class,'category'])->name('grading-setup/category');
        Route::post('/store', [GradebookController::class,'store'])->name('grading-setup/store');
        Route::post('/grade_item_store', [GradebookController::class,'grade_item_store'])->name('grading-setup/grade_item_store');
        Route::post('/grade_store', [GradebookController::class,'grade_store'])->name('grading-setup/grade_store');
    });

    Route::group(['prefix' => 'student'],function(){
        Route::get('/lists', [StudentController::class,'index'])->name('student/lists');
        Route::post('/store', [StudentController::class,'store'])->name('student/store');
        Route::post('/udpate/{sid}', [StudentController::class,'updated'])->name('student/update/{sid}');
    });

    Route::group(['prefix' => 'subject'],function(){
        Route::get('/lists', [SubjectController::class,'index'])->name('subject/lists');
        Route::get('/create', [SubjectController::class,'create'])->name('subject/create');
        Route::get('/edit/{sid}', [SubjectController::class,'edit'])->name('subject/edit/{sid}');
        Route::post('/store', [SubjectController::class,'store'])->name('subject/store');
        Route::post('/udpate/{sid}', [SubjectController::class,'updated'])->name('subject/update/{sid}');
    });

    Route::group(['prefix' => 'member'],function(){
        Route::get('/lists', [MemberController::class,'index'])->name('member/lists');
        Route::get('/create', [MemberController::class,'create'])->name('member/create');
        Route::get('/view/subjects/{mid}',[MemberController::class,'get_subjects'])->name('member/view/subjects/{mid}');
        Route::get('/{iid}/subject/{sid}/class',[MemberController::class,'get_subjects_class'])->name('member/{iid}/subject/{sid}/class');
        Route::get('/{iid}/subject/{sid}/student/{id}',[MemberController::class,'get_subjects_grade'])->name('member/{iid}/subject/{sid}/student/{id}');
        Route::get('/edit/{sid}', [MemberController::class,'edit'])->name('member/edit/{sid}');
        Route::post('/store', [MemberController::class,'store'])->name('member/store');
        Route::post('/udpate/{sid}', [MemberController::class,'updated'])->name('member/update/{sid}');
    });
    
    Route::group(['prefix' => 'role'],function(){
        Route::get('/lists', [RoleController::class,'index'])->name('role/lists');
        // Route::post('/udpate/{sid}', [RoleController::class,'updated'])->name('student/update/{sid}');
    });
});

Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Cleared!";
});


