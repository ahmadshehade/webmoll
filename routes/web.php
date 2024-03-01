<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/dashbord', [HomeController::class, 'dashbord'])->name('dashbord');
Route::put('/users/{id}/updaterole', [HomeController::class, 'updateRole'])->name('users.updateRole');
//
Route::get('/moles', 'MoleController@index')->name('mole.index');
Route::get('/mole/create', 'MoleController@create')->name('mole.create');
Route::post('/mole/store', 'MoleController@store')->name('mole.store');
Route::get('/mole/edit/{id}', 'MoleController@edit')->name('mole.edit');
Route::put('/mole/update/{id}', 'MoleController@update')->name('mole.update');

//
Route::resource('onner', 'OwnnerController');
//
Route::resource('investors', 'InvestorsController');
//
Route::get('/InvestorOwner', 'InvestorOwnnerController@index')->name('InvestorOwner.index');
Route::delete('/InvestorOwner/destroy/{id}', 'InvestorOwnnerController@destroy')->name('InvestorOwner.destroy');
//
Route::resource('/floors', 'FloorController');
//
Route::resource('/departments','DepartmentsController');
//
Route::resource('/employe','EmployController');
//
Route::get('investorandfloor','InvestorFloorController@index')->name('Investorfloor.index');
Route::delete('investorandfloor/delete/{id}','InvestorFloorController@destroy')->name('investorfloor.delete');
//
Route::get('investordepartments','InvestorDepartmentController@index')->name('investordepartment.index');
Route::delete('InvestorDepartmentController/delete/{id}','InvestorDepartmentController@destroy')->name('investordepartment.delete');
//
Route::get('profiles', 'profileController@index')->name('profiles.index');
Route::get('profiles/create', 'profileController@create')->name('profiles.create');
Route::post('profiles', 'profileController@store')->name('profiles.store');
Route::get('profiles/{id}/edit', 'profileController@edit')->name('profiles.edit');
Route::put('profiles/{id}', 'profileController@update')->name('profiles.update');
Route::delete('profiles/{id}', 'profileController@destroy')->name('profiles.destroy');
//
Route::resource('product','ProductController');
Route::get('/products/trash','ProductController@trash')->name('products.trash');
Route::delete('/products/{id}/hdelete', 'ProductController@hdelete')->name('product.hdelete');
Route::patch('/products/{id}/restore', 'ProductController@restore')->name('product.restore');
Route::get('/products/{id}/addToBasket', 'ProductController@addToBasket')->name('product.addToBasket');
//
// routes/web.php

use App\Http\Controllers\BasketController;
use App\Models\BasketProduct;

// عرض قائمة السلات
Route::get('/baskets', [BasketController::class, 'index'])->name('baskets.index');
Route::get('/basketsall', [BasketController::class, 'allindex'])->name('baskets.allindex');

// عرض نموذج إنشاء سلة جديدة
Route::get('/baskets/create', [BasketController::class, 'create'])->name('baskets.create');

// إنشاء سلة جديدة
Route::post('/baskets', [BasketController::class, 'store'])->name('baskets.store');

// عرض تفاصيل سلة محددة
Route::get('/baskets/{basket}', [BasketController::class, 'show'])->name('baskets.show');

// عرض نموذج تحديث سلة محددة
Route::get('/baskets/{basket}/edit', [BasketController::class, 'edit'])->name('baskets.edit');

// تحديث سلة محددة
Route::put('/baskets/{basket}', [BasketController::class, 'update'])->name('baskets.update');

// حذف سلة محددة
Route::delete('/baskets/{basket}', [BasketController::class, 'destroy'])->name('baskets.destroy');

// عرض قائمة السلات المحذوفة
Route::get('trash', [BasketController::class, 'trash'])->name('baskets.trash');

// استعادة سلة محذوفة
Route::patch('/baskets/{basket}/restore', [BasketController::class, 'restore'])->name('baskets.restore');

// حذف سلة محذوفة نهائيًا
Route::delete('/baskets/{basket}/hdelete', [BasketController::class, 'hdelete'])->name('baskets.hdelete');
//

Route::delete('/basketsproducts/destroy/{id}', 'ProductsBasketsController@destroy')->name('productbasket.destroy');
