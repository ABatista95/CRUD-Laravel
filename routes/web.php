<?php

use App\Exports\OffersExport;
use App\Http\Controllers\OfferController;
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

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/offers', function () {
    return view('modules.offers.offers_home');
});

Route::prefix('offers')->group(function () {
    Route::get('create', [OfferController::class, 'create'])->name('offers.create');
    Route::get('show', [OfferController::class, 'show'])->name('offers.show');
    Route::post('store', [OfferController::class, 'store'])->name('offers.store');

    // route to generate excel exports
    Route::get('/export', [OfferController::class, 'exportExcel'])->name('offers.export');

    // Filters in view show
    Route::post('/filters', [OfferController::class, 'showFilters'])->name('offers.filters');

});


//Route::resource('offers', OfferController::class);
