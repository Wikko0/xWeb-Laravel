<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\doController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\VipController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\xController;
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

// Get List
Route::get('/', [xController::class, 'index']);
Route::get('/register', [xController::class, 'register']);
Route::get('/download', [xController::class, 'download']);
Route::get('/ranking', [xController::class, 'ranking']);
Route::get('/news', [xController::class, 'news']);
Route::get('/login', [xController::class, 'login']);
Route::get('/account-panel', [xController::class, 'account_panel']);
Route::get('/information', [xController::class, 'information']);
Route::get('/user/{username}', [xController::class, 'user']);

Route::get('/logout', [doController::class, 'do_logout']);


// Do List
Route::post('/register', [doController::class, 'do_register']);
Route::post('/login', [doController::class, 'do_login']);


// User Panel
Route::post('/reset', [UserController::class, 'do_reset']);
Route::get('/reset', [UserController::class, 'reset'])->middleware('user');
Route::get('/add-stats', [UserController::class, 'addstats'])->middleware('user');
Route::post('/add-stats', [UserController::class, 'do_addstats']);
Route::get('/grand-reset', [UserController::class, 'grandreset'])->middleware('user');
Route::post('/grand-reset', [UserController::class, 'do_grandreset']);
Route::get('/clearpk', [UserController::class, 'clearpk'])->middleware('user');
Route::post('/clearpk', [UserController::class, 'do_clearpk']);
Route::get('/rename', [UserController::class, 'rename'])->middleware('user');
Route::post('/rename', [UserController::class, 'do_rename']);
Route::get('/resetstats', [UserController::class, 'resetstats'])->middleware('user');
Route::post('/resetstats', [UserController::class, 'do_resetstats']);
Route::get('/buycredits', [UserController::class, 'buycredits'])->middleware('user');


// Admin Panel
Route::get('/adminpanel/login', [AdminController::class, 'adminlogin']);
Route::get('/adminpanel/panel', [AdminController::class, 'panel']);
Route::post('/adminpanel/panel', [AdminController::class, 'do_panel']);
Route::get('/adminpanel', [AdminController::class, 'adminhome'])->middleware('admin');
Route::get('/adminpanel/seo', [AdminController::class, 'adminseo'])->middleware('admin');
Route::get('/adminpanel/announce', [AdminController::class, 'adminannounce'])->middleware('admin');
Route::get('/adminpanel/download', [AdminController::class, 'download'])->middleware('admin');
Route::get('/adminpanel/event', [AdminController::class, 'event'])->middleware('admin');
Route::get('/adminpanel/boss', [AdminController::class, 'boss'])->middleware('admin');
Route::get('/adminpanel/slider', [AdminController::class, 'slider'])->middleware('admin');
Route::get('/adminpanel/news', [AdminController::class, 'news'])->middleware('admin');
Route::get('/adminpanel/events', [AdminController::class, 'events'])->middleware('admin');
Route::get('/adminpanel/updates', [AdminController::class, 'updates'])->middleware('admin');
Route::get('/adminpanel/hof', [AdminController::class, 'hof'])->middleware('admin');
Route::get('/adminpanel/hofswitch', [AdminController::class, 'hofswitch'])->middleware('admin');
Route::get('/adminpanel/reset', [AdminController::class, 'reset'])->middleware('admin');
Route::get('/adminpanel/addstats', [AdminController::class, 'addstats'])->middleware('admin');
Route::get('/adminpanel/grand-reset', [AdminController::class, 'grandreset'])->middleware('admin');
Route::get('/adminpanel/pkclear', [AdminController::class, 'pkclear'])->middleware('admin');
Route::get('/adminpanel/rename', [AdminController::class, 'rename'])->middleware('admin');
Route::get('/adminpanel/resetstats', [AdminController::class, 'resetstats'])->middleware('admin');
Route::get('/adminpanel/paypal', [AdminController::class, 'paypal'])->middleware('admin');
Route::get('/adminpanel/paypal-pack', [AdminController::class, 'paypal_pack'])->middleware('admin');
Route::get('/adminpanel/information', [AdminController::class, 'information'])->middleware('admin');
Route::get('/adminpanel/addinfo', [AdminController::class, 'addinfo'])->middleware('admin');

Route::post('/adminpanel/addinfo', [AdminController::class, 'do_addinfo']);
Route::post('/adminpanel/information', [AdminController::class, 'do_information']);
Route::delete('/adminpanel/paypal-pack', [AdminController::class, 'paypal_pack_delete']);
Route::post('/adminpanel/paypal-pack', [AdminController::class, 'do_paypal_pack']);
Route::post('/adminpanel/paypal', [AdminController::class, 'do_paypal']);
Route::post('/adminpanel/resetstats', [AdminController::class, 'do_resetstats']);
Route::post('/adminpanel/rename', [AdminController::class, 'do_rename']);
Route::post('/adminpanel/pkclear', [AdminController::class, 'do_pkclear']);
Route::post('/adminpanel/grand-reset', [AdminController::class, 'do_grandreset']);
Route::post('/adminpanel/addstats', [AdminController::class, 'do_addstats']);
Route::post('/adminpanel/reset', [AdminController::class, 'do_reset']);
Route::post('/adminpanel/hof', [AdminController::class, 'hof_add']);
Route::post('/adminpanel/hofswitch', [AdminController::class, 'hof_switch']);
Route::post('/adminpanel/news', [AdminController::class, 'news_upload']);
Route::delete('/adminpanel/news', [AdminController::class, 'news_delete']);
Route::post('/adminpanel/events', [AdminController::class, 'events_upload']);
Route::delete('/adminpanel/events', [AdminController::class, 'events_delete']);
Route::post('/adminpanel/updates', [AdminController::class, 'updates_upload']);
Route::delete('/adminpanel/updates', [AdminController::class, 'updates_delete']);
Route::post('/adminpanel/slider', [AdminController::class, 'slider_upload']);
Route::delete('/adminpanel/slider', [AdminController::class, 'slider_delete']);
Route::post('/adminpanel/boss', [AdminController::class, 'do_boss']);
Route::delete('/adminpanel/boss', [AdminController::class, 'do_boss_delete']);
Route::post('/adminpanel/event', [AdminController::class, 'do_event']);
Route::delete('/adminpanel/event', [AdminController::class, 'do_event_delete']);
Route::post('/adminpanel/download', [AdminController::class, 'do_download']);
Route::delete('/adminpanel/download', [AdminController::class, 'do_download_delete']);
Route::post('/adminpanel/announce', [AdminController::class, 'do_adminannounce']);
Route::post('/adminpanel/seo', [AdminController::class, 'do_adminseo']);
Route::post('/adminpanel/login', [AdminController::class, 'do_adminlogin']);


// Payment
Route::post('/pay', [PaymentController::class, 'pay']);
Route::get('/success', [PaymentController::class, 'success']);
Route::get('/error', [PaymentController::class, 'error']);

// VIP System
Route::post('/getvip', [VipController::class, 'getVip']);



