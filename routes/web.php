<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReportsController;
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
Route::redirect('/', '/dashboard'); // this impostant as when i visit / he put dashboard autmaticly and vite dashboard page

Route::group(
    [
        'prefix' => 'dashboard',
        'as' => 'dashboard.'
    ],
    function () {
        Route::get('/', HomeController::class)->name('home');

        ////Clients///
        Route::group([
            'prefix' => 'clients',
            'as' => 'clients.',
            'controller' => ClientController::class
        ], function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/data', 'data')->name('data');
        });

        ////orders///
        Route::group([
            'prefix' => 'orders',
            'as' => 'orders.',
            'controller' => OrderController::class
        ], function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::get('/show/{order}', 'show')->name('show');
            Route::post('/store', 'store')->name('store');
            Route::get('/data', 'data')->name('data');
        });

        ////reports///
        Route::group([
            'prefix' => 'reports',
            'as' => 'reports.',
            'controller' => ReportsController::class
        ], function () {
            Route::get('/orderReport', 'ordersReport')->name('ordersReport');
            Route::get('/ordersReportData', 'ordersReportData')->name('ordersReportData');
            Route::get('/clientReport', 'clientsReport')->name('clientsReport');
            Route::get('/clientsReportData', 'clientsReportData')->name('clientsReportData');
        });
    }
);

