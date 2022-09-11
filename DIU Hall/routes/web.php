<?php

use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\unitAdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\manyStudentTableController;
use App\Http\Controllers\SingleStudentController;
use App\Http\Controllers\floorController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\StudentApplicationController;
use App\Http\Controllers\floorControllerForAdmin;
use App\Http\Controllers\StudentApplicationAdminController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\StudentLoginController;

 Route::get('/contactPage', function () {
     return view('Frontend.contactPage');
 });


//Route for Frontend

Route::get('/',[HomeController::class,'HomeIndex']);
Route::get('/idSearch',[HomeController::class,'idSearch'])->middleware('LoginCheck');
Route::get('/studentSearch/{id}',[HomeController::class,'studentSearch'])->middleware('LoginCheck');;;
Route::get('/getFloorData',[floorController::class,'GetFloorData']);
Route::get('/unit/{floorName}',[UnitController::class,'UnitIndex'])->middleware('LoginCheck');;;
Route::get('/unit/{floorName}/{unitName}',[manyStudentTableController::class,'ManyStudent'])->middleware('LoginCheck');;;
Route::get('/unit/{floorName}/{unitName}/{studentid}',[SingleStudentController::class,'SingleStudent'])->middleware('LoginCheck');;;
Route::get('/pdf/{studentid}',[PDFController::class,'PDF'])->middleware('LoginCheck');;;
Route::get('/StudentApplication',[StudentApplicationController::class,'StudentApplication']);





//Route for Admin

Route::get('/dashboard1', function () {
    return view('backend.Dashboard');
})->middleware('LoginCheckAdmin');;

Route::get('/floor',[floorControllerForAdmin::class,'floor'])->middleware('LoginCheckAdmin');;;
Route::get('/getFloorDataAdmin',[floorControllerForAdmin::class,'getFloorData'])->middleware('LoginCheckAdmin');;;
Route::post('/floorAdd',[floorControllerForAdmin::class,'floorAdd'])->middleware('LoginCheckAdmin');;;
Route::post('/FloorEdit',[floorControllerForAdmin::class,'FloorEdit'])->middleware('LoginCheckAdmin');;;
Route::post('/FloorEditUpdateConfirmBtn',[floorControllerForAdmin::class,'FloorEditUpdateConfirmBtn'])->middleware('LoginCheckAdmin');;;
Route::post('/FloorDelete',[floorControllerForAdmin::class,'FloorDelete'])->middleware('LoginCheckAdmin');;;



Route::get('/unit',[unitAdminController::class,'unit'])->middleware('LoginCheckAdmin');;;
Route::get('/getUnitDataAdmin',[unitAdminController::class,'getUnitData'])->middleware('LoginCheckAdmin');;;
Route::post('/UnitAdd',[unitAdminController::class,'UnitAdd'])->middleware('LoginCheckAdmin');;;
Route::post('/UnitEdit',[unitAdminController::class,'UnitEdit'])->middleware('LoginCheckAdmin');;;
Route::post('/UnitEditUpdateConfirmBtn',[unitAdminController::class,'UnitEditUpdateConfirmBtn'])->middleware('LoginCheckAdmin');;;
Route::post('/UnitDelete',[unitAdminController::class,'UnitDelete'])->middleware('LoginCheckAdmin');;;





Route::get('/studentApplication',[StudentApplicationAdminController::class,'studentApplication']);;
Route::get('/studentApplicationForm',[StudentApplicationAdminController::class,'studentApplicationForm']);
Route::post('/submitFromAdmin',[StudentApplicationAdminController::class,'submitFromAdmin']);;;
Route::post('/submitFromAdmin1',[StudentApplicationAdminController::class,'submitFromAdmin1']);
Route::post('/floorToUnit',[StudentApplicationAdminController::class,'floorToUnit']);
Route::get('/submitedData',[StudentApplicationAdminController::class,'submitedData']);
Route::post('/StudentEditAdmin',[StudentApplicationAdminController::class,'StudentEditAdmin'])->middleware('LoginCheckAdmin');;;
Route::post('/submit',[StudentApplicationAdminController::class,'submit'])->middleware('LoginCheckAdmin');;;
Route::post('/submit1',[StudentApplicationAdminController::class,'submit1'])->middleware('LoginCheckAdmin');;;
Route::post('/submitDelete',[StudentApplicationAdminController::class,'submitDelete'])->middleware('LoginCheckAdmin');;;
Route::post('/paymentMethod',[StudentApplicationAdminController::class,'paymentMethod'])->middleware('LoginCheck');;
Route::get('/paymentAdminControl',[StudentApplicationAdminController::class,'paymentAdminControl']);
Route::get('/getStudentDataPaymentClear',[StudentApplicationAdminController::class,'getStudentDataPaymentClear'])->middleware('LoginCheckAdmin');;;


//Admin Login Extra Login Route Not Use in My website
Route::post('/onLogin',[StudentLoginController::class,'onLogin']);
Route::get('/StudentLogin',[StudentLoginController::class,'StudentLogin']);
Route::post('/submitNewAccount',[StudentLoginController::class,'submitNewAccount']);
Route::post('/submitForgotAccount',[StudentLoginController::class,'submitForgotAccount']);
Route::get('/onLogout',[StudentLoginController::class,'onLogout']);


// SSLCOMMERZ Start
Route::get('/example1/{id}/{date}', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END


//Laravel Auth Login Frontend
Route::get('dashboard', [CustomAuthController::class, 'dashboard']);
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
Route::get('/changePassword/{id}/{img}', [CustomAuthController::class, 'changePassword']);
Route::post('/changePasswordPost', [CustomAuthController::class, 'changePasswordPost'])->name('change.custom');
Route::get('/reset', [CustomAuthController::class, 'reset'])->name('reset');
Route::get('/reset', [CustomAuthController::class, 'reset'])->name('reset');
Route::post('/forget-password', [CustomAuthController::class, 'postEmail'])->name('forget-password');
Route::get('/reset-password/{token}', [ResetPasswordController::class,'getPassword'])->name('reset.password.get');
Route::post('/reset-password', [ResetPasswordController::class,'updatePassword'])->name('reset.password.post');


//Laravel Auth Login Admin
Route::get('admindashboard', [AdminLoginController::class, 'dashboard']);
Route::get('adminlogin', [AdminLoginController::class, 'index1'])->name('adminlogin');
Route::post('admincustom-login', [AdminLoginController::class, 'customLogin1'])->name('login.custom1');
Route::get('adminregistration', [AdminLoginController::class, 'registration1'])->name('register-user1');
Route::post('admincustom-registration', [AdminLoginController::class, 'customRegistration1'])->name('register.custom1');
Route::get('adminsignout', [AdminLoginController::class, 'signOut1'])->name('adminsignout');
