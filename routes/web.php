<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\aya\IndexController;
use App\Http\Controllers\aya\RegisterController;
use App\Http\Controllers\aya\LoginController;
use App\Http\Controllers\aya\ForgotPasswordController;
use App\Http\Controllers\aya\ContactController;

use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\dashboard\TransactionController;
use App\Http\Controllers\dashboard\ProfileController;
use App\Http\Controllers\dashboard\RenewalController;
use App\Http\Controllers\admin\AdminloginController;
use App\Http\Controllers\admin\AdmindashboardController;
use App\Http\Controllers\admin\TransactionsController;
use App\Http\Controllers\admin\CustomerController;
use App\Http\Controllers\admin\MessageController;
use App\Http\Controllers\admin\RenewalController as RenewalsController;



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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/portfolio', [IndexController::class, "portfolio"])->name('portfolio');
Route::get('/vera', [IndexController::class, "vera"])->name('vera');
Route::get('/affiliate', [IndexController::class, "affiliate"])->name('affiliate');
Route::get('/contact', [ContactController::class, "contact"])->name('contact');
Route::get('/signup/{str}', [IndexController::class, "signup"])->name('signup');
Route::post('/saveuser', [RegisterController::class, "saveUser"])->name('save.user');
Route::get('/login', [LoginController::class, "login"])->name('login');
Route::post('/login', [LoginController::class, "processlogin"])->name('processlogin');
Route::post('/savecontact', [ContactController::class, "saveContact"])->name('savecontact');

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

 Route::group(['middleware'=>'is_auth'], function(){
    Route::get('/logout', [LoginController::class, "logout"])->name('logout');

    Route::get('/dashboard', [DashboardController::class, "index"])->name('dashboard');
    Route::any('/getnotification', [DashboardController::class, 'getnotification'])->name('getnotification');
    Route::any('/getmessages', [DashboardController::class, 'getmessages'])->name('getmessages');
    Route::get('/withdraw', [TransactionController::class, 'withdraw'])->name('withdraw');
    Route::post('/withdraw', [TransactionController::class, 'withdrawamount'])->name('withdraw.amount');
    
    Route::get('/transactions', [TransactionController::class, "index"])->name('transactions');
    Route::get('/profile', [ProfileController::class, "index"])->name('profile');
    Route::post('/profile', [ProfileController::class, "update"])->name('profile.update');
    Route::post('/updatepassword', [ProfileController::class, "updatePassword"])->name('profile.update.password');


    Route::post('/renewal', [RenewalController::class,'renew'])->name('renew');
    Route::get('/renewals', [RenewalController::class,'listRenewals'])->name('renewals');
    
 });
 

Route::get('adminLogin', [AdminloginController::class, 'index'])->name('admin.login');
Route::post('authcheck', [AdminloginController::class, 'processLogin'])->name('process.login');

Route::group(['middleware'=>'is_admin_auth', 'prefix'=>'admin'], function(){
      Route::get('dashboard', [AdmindashboardController::class, 'index'])->name('admin.dashboard');
      Route::get('transactions', [TransactionsController::class, 'index'])->name('admin.transactions');
      Route::post('changepaymentstat', [TransactionsController::class, 'changePaymentStatus'])->name('change.payment.status');
      Route::get('customers', [CustomerController::class, 'index'])->name('admin.customers');
      Route::post('changeaccountstat', [CustomerController::class, 'changeStatus'])->name('change.account.status');
      Route::get('sendmessage', [MessageController::class, 'index'])->name('admin.sendmessage');
      Route::post('savemessage', [MessageController::class, 'saveMessage'])->name('admin.savemessage');
      Route::get('renewals', [RenewalsController::class, 'renewals'])->name('admin.renewals');
      Route::post('changerenewalstatus', [RenewalsController::class, 'changeRenewalStatus'])->name('change.renewal.status');
   });
   Route::get('/{var??}', [IndexController::class, "index"])->name('home');

   


