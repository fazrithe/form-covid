<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TestCovidController;

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
Route::redirect('/', '/login');
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('test_covids', TestCovidController::class);
    Route::get('testcovid/list', [TestCovidController::class, 'getTestCovid'])->name('testcovid.list');
    Route::get('print_test/{id}', [TestCovidController::class, 'print_test'])->name('print_test');
    Route::get('result_pdf/{id}', [TestCovidController::class, 'pdf'])->name('result_pdf');
    Route::get('qrcode', function () {
        return QrCode::size(250)
            ->backgroundColor(255, 255, 204)
            ->generate('MyNotePaper');
    });
});
Route::get('view_pdf/{id}', [TestCovidController::class, 'view_pdf']);
Route::get('view_result/{id}', [TestCovidController::class, 'view_result']);
