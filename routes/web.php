<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});
//Route::get('/','PagesController@index');
Route::get('/', [App\Http\Controllers\PagesController::class, 'index'])->name('Home');
Route::prefix('admin')->group(function (){

    Route::get('/dashboard', [App\Http\Controllers\PagesController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/main', [App\Http\Controllers\MainPagesController::class, 'index'])->name('admin.main');
    Route::PUT('/main', [App\Http\Controllers\MainPagesController::class, 'update'])->name('admin.main.update');
    Route::get('/services/create', [App\Http\Controllers\ServicePagesController::class, 'create'])->name('admin.service.create');
    Route::post('/services/create', [App\Http\Controllers\ServicePagesController::class, 'store'])->name('admin.service.store');
    Route::GET('/services/list', [App\Http\Controllers\ServicePagesController::class, 'list'])->name('admin.service.list');
    Route::get('/services/edit/{id}', [App\Http\Controllers\ServicePagesController::class, 'edit'])->name('admin.services.edit');
    Route::post('/services/update/{id}', [App\Http\Controllers\ServicePagesController::class, 'update'])->name('admin.services.update');
    Route::delete('/services/destroy/{id}', [App\Http\Controllers\ServicePagesController::class, 'destroy'])->name('admin.services.destroy');

    Route::get('/portfolios/create', [App\Http\Controllers\PortfolioPagesController::class, 'create'])->name('admin.portfolios.create');
    Route::put('/portfolios/create', [App\Http\Controllers\PortfolioPagesController::class, 'store'])->name('admin.portfolios.store');
    Route::GET('/portfolios/list', [App\Http\Controllers\PortfolioPagesController::class, 'list'])->name('admin.portfolios.list');
    Route::get('/portfolios/edit/{id}', [App\Http\Controllers\PortfolioPagesController::class, 'edit'])->name('admin.portfolios.edit');
    Route::post('/portfolios/update/{id}', [App\Http\Controllers\PortfolioPagesController::class, 'update'])->name('admin.portfolios.update');
    Route::delete('/portfolios/destroy/{id}', [App\Http\Controllers\PortfolioPagesController::class, 'destroy'])->name('admin.portfolios.destroy');

    Route::get('/abouts/create', [App\Http\Controllers\AboutPagesController::class, 'create'])->name('admin.abouts.create');
    Route::put('/abouts/create', [App\Http\Controllers\AboutPagesController::class, 'store'])->name('admin.abouts.store');
    Route::GET('/abouts/list', [App\Http\Controllers\AboutPagesController::class, 'list'])->name('admin.abouts.list');
    Route::get('/abouts/edit/{id}', [App\Http\Controllers\AboutPagesController::class, 'edit'])->name('admin.abouts.edit');
    Route::post('/abouts/update/{id}', [App\Http\Controllers\AboutPagesController::class, 'update'])->name('admin.abouts.update');
    Route::delete('/abouts/destroy/{id}', [App\Http\Controllers\AboutPagesController::class, 'destroy'])->name('admin.abouts.destroy');
});
    Route::post('/contact',[App\Http\Controllers\ContactFormController::class,'store'])->name('contact.store');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
