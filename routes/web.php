<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ExamsController;

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

Route::get('/', [App\Http\Controllers\FrontController::class, 'index']);
Route::get('/course', [App\Http\Controllers\FrontController::class, 'courseList']);

//----------------------------------------User-----------------------------------------------------------------------

Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

Route::get('password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('password/confirm', [App\Http\Controllers\Auth\ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
Route::post('password/confirm', [App\Http\Controllers\Auth\ConfirmPasswordController::class, 'confirm']);

Route::get('email/verify', [App\Http\Controllers\Auth\VerificationController::class, 'show'])->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [App\Http\Controllers\Auth\VerificationController::class, 'verify'])->name('verification.verify');
Route::post('email/resend', [App\Http\Controllers\Auth\VerificationController::class, 'resend'])->name('verification.resend');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//------------------------------------------------Admin-----------------------------------------------------------

Route::prefix('admin')->group(function (){
	//Dashboard
	Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.index');

	//Login
	Route::get('/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'showLoginForm'])->name('admin.login');
	Route::post('/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'login'])->name('admin.login.submit');

	//Login
	Route::get('/register', [App\Http\Controllers\Auth\AdminRegisterController::class, 'showRegisterForm'])->name('admin.register');
	Route::post('/register', [App\Http\Controllers\Auth\AdminRegisterController::class, 'register'])->name('admin.register.submit');

	//Logout
	Route::get('/logout', [App\Http\Controllers\Auth\AdminLoginController::class, 'logout'])->name('admin.logout');

	//Category Maker
	Route::resource('category', App\Http\Controllers\Admin\CategoriesController::class);
	Route::get('/category/export/{type}', [App\Http\Controllers\Admin\CategoriesController::class, 'export']);

	//Exams
	Route::resource('exam', ExamsController::class);

	//Exam Overviews Routes
	Route::get('/exam/overview/{id}', [ExamsController::class, 'examOverview']);
	Route::get('/exam/overview/add_overview/{id}', [ExamsController::class, 'examOverviewCreateForm']);
	Route::post('/exam/overview/add_overview', [ExamsController::class, 'examOverviewCreate']);
	Route::get('/exam/overview/edit_overview/{id}', [ExamsController::class, 'examOverviewEditForm']);
	Route::post('/exam/overview/edit_overview/{id}', [ExamsController::class, 'examOverviewEdit']);
	Route::get('/exam/overview/delete_overview/{id}', [ExamsController::class, 'examOverviewDelete']);

	//Exam Date Routes
	Route::get('/exam/date/{id}', [ExamsController::class, 'examDate']);
	Route::get('/exam/date/add_date/{id}', [ExamsController::class, 'examDateCreateForm']);
	Route::post('/exam/date/add_date', [ExamsController::class, 'examDateCreate']);
	Route::get('/exam/date/edit_date/{id}', [ExamsController::class, 'examDateEditForm']);
	Route::post('/exam/date/edit_date/{id}', [ExamsController::class, 'examDateEdit']);
	Route::get('/exam/date/delete_date/{id}', [ExamsController::class, 'examDateDelete']);

	//Exam Syllabus Routes
	Route::get('/exam/syllabus/{id}', [ExamsController::class, 'examSyllabus']);
	Route::get('/exam/syllabus/add_syllabus/{id}', [ExamsController::class, 'examSyllabusCreateForm']);
	Route::post('/exam/syllabus/add_syllabus', [ExamsController::class, 'examSyllabusCreate']);
	Route::get('/exam/syllabus/edit_syllabus/{id}', [ExamsController::class, 'examSyllabusEditForm']);
	Route::post('/exam/syllabus/edit_syllabus/{id}', [ExamsController::class, 'examSyllabusEdit']);
	Route::get('/exam/syllabus/delete_syllabus/{id}', [ExamsController::class, 'examSyllabusDelete']);

	//Exam Appform Routes
	Route::get('/exam/appform/{id}', [ExamsController::class, 'examAppform']);
	Route::get('/exam/appform/add_appform/{id}', [ExamsController::class, 'examAppformCreateForm']);
	Route::post('/exam/appform/add_appform', [ExamsController::class, 'examAppformCreate']);
	Route::get('/exam/appform/edit_appform/{id}', [ExamsController::class, 'examAppformEditForm']);
	Route::post('/exam/appform/edit_appform/{id}', [ExamsController::class, 'examAppformEdit']);
	Route::get('/exam/appform/delete_appform/{id}', [ExamsController::class, 'examAppformDelete']);

	//Exam Pattern Routes
	Route::get('/exam/pattern/{id}', [ExamsController::class, 'examPattern']);
	Route::get('/exam/pattern/add_pattern/{id}', [ExamsController::class, 'examPatternCreateForm']);
	Route::post('/exam/pattern/add_pattern', [ExamsController::class, 'examPatternCreate']);
	Route::get('/exam/pattern/edit_pattern/{id}', [ExamsController::class, 'examPatternEditForm']);
	Route::post('/exam/pattern/edit_pattern/{id}', [ExamsController::class, 'examPatternEdit']);
	Route::get('/exam/pattern/delete_pattern/{id}', [ExamsController::class, 'examPatternDelete']);

	//Exam Preparation Routes
	Route::get('/exam/preparation/{id}', [ExamsController::class, 'examPreparation']);
	Route::get('/exam/preparation/add_preparation/{id}', [ExamsController::class, 'examPreparationCreateForm']);
	Route::post('/exam/preparation/add_preparation', [ExamsController::class, 'examPreparationCreate']);
	Route::get('/exam/preparation/edit_preparation/{id}', [ExamsController::class, 'examPreparationEditForm']);
	Route::post('/exam/preparation/edit_preparation/{id}', [ExamsController::class, 'examPreparationEdit']);
	Route::get('/exam/preparation/delete_preparation/{id}', [ExamsController::class, 'examPreparationDelete']);

	//Exam Question Routes
	Route::get('/exam/question/{id}', [ExamsController::class, 'examQuestion']);
	Route::get('/exam/question/add_question/{id}', [ExamsController::class, 'examQuestionCreateForm']);
	Route::post('/exam/question/add_question', [ExamsController::class, 'examQuestionCreate']);
	Route::get('/exam/question/edit_question/{id}', [ExamsController::class, 'examQuestionEditForm']);
	Route::post('/exam/question/edit_question/{id}', [ExamsController::class, 'examQuestionEdit']);
	Route::get('/exam/question/delete_question/{id}', [ExamsController::class, 'examQuestionDelete']);

	//Exam Answer Routes
	Route::get('/exam/answer/{id}', [ExamsController::class, 'examAnswer']);
	Route::get('/exam/answer/add_answer/{id}', [ExamsController::class, 'examAnswerCreateForm']);
	Route::post('/exam/answer/add_answer', [ExamsController::class, 'examAnswerCreate']);
	Route::get('/exam/answer/edit_answer/{id}', [ExamsController::class, 'examAnswerEditForm']);
	Route::post('/exam/answer/edit_answer/{id}', [ExamsController::class, 'examAnswerEdit']);
	Route::get('/exam/answer/delete_answer/{id}', [ExamsController::class, 'examAnswerDelete']);

	//Exam Result Routes
	Route::get('/exam/result/{id}', [ExamsController::class, 'examResult']);
	Route::get('/exam/result/add_result/{id}', [ExamsController::class, 'examResultCreateForm']);
	Route::post('/exam/result/add_result', [ExamsController::class, 'examResultCreate']);
	Route::get('/exam/result/edit_result/{id}', [ExamsController::class, 'examResultEditForm']);
	Route::post('/exam/result/edit_result/{id}', [ExamsController::class, 'examResultEdit']);
	Route::get('/exam/result/delete_result/{id}', [ExamsController::class, 'examResultDelete']);

	//Exam Cutoff Routes
	Route::get('/exam/cutoff/{id}', [ExamsController::class, 'examCutoff']);
	Route::get('/exam/cutoff/add_cutoff/{id}', [ExamsController::class, 'examCutoffCreateForm']);
	Route::post('/exam/cutoff/add_cutoff', [ExamsController::class, 'examCutoffCreate']);
	Route::get('/exam/cutoff/edit_cutoff/{id}', [ExamsController::class, 'examCutoffEditForm']);
	Route::post('/exam/cutoff/edit_cutoff/{id}', [ExamsController::class, 'examCutoffEdit']);
	Route::get('/exam/cutoff/delete_cutoff/{id}', [ExamsController::class, 'examCutoffDelete']);

	//Exam Couselling Routes
	Route::get('/exam/counselling/{id}', [ExamsController::class, 'examCounselling']);
	Route::get('/exam/counselling/add_counselling/{id}', [ExamsController::class, 'examCounsellingCreateForm']);
	Route::post('/exam/counselling/add_counselling', [ExamsController::class, 'examCounsellingCreate']);
	Route::get('/exam/counselling/edit_counselling/{id}', [ExamsController::class, 'examCounsellingEditForm']);
	Route::post('/exam/counselling/edit_counselling/{id}', [ExamsController::class, 'examCounsellingEdit']);
	Route::get('/exam/counselling/delete_counselling/{id}', [ExamsController::class, 'examCounsellingDelete']);

	//Courses
	Route::resource('course', App\Http\Controllers\Admin\CoursesController::class);

	//Colleges
	Route::resource('college', App\Http\Controllers\Admin\CollegesController::class);
});
