<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmpUserController;

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
//---------Login to the User
Route::get('/',[LoginController::class,'index']);
Route::resource('login',LoginController::class);
Route::post('/check',[LoginController::class,'checklogin']);
Route::get('/logout',[LoginController::class,'logout']);

//---------Admin
Route::resource('admin',AdminController::class);

//---------Employee additions
Route::resource('employees',EmployeeController::class);
Route::resource('emp',EmpUserController::class);

Route::resource('products',ProductController::class);

//-----------Customers
Route::resource('customers',CustomerController::class);
Route::get('/cusname',[CustomerController::class,'show']);
Route::get('/placeorder',[CustomerController::class,'placeorder']);
Route::get('/order/{user}/{product}',[CustomerController::class,'order']);
Route::post('/storeorder',[CustomerController::class,'storeorder']);

Route::get('/myorder',[CustomerController::class,'myorder']);
Route::get('/cancel/{order}',[CustomerController::class,'cancelorder']);
Route::post('/cancelcon/{order}',[CustomerController::class,'confirmcancel']);


//-----------Employee User functions 
Route::get('/emporders',[EmpUserController::class,'myorders']);
Route::get('/resetpw',[EmpUserController::class,'resetpassword']);
Route::post('/changepw',[EmpUserController::class,'changepassword']);
Route::get('/delivery/{order}',[EmpUserController::class,'delivery']);
Route::post('/condelivery/{order}',[EmpUserController::class,'confirmdelivery']);