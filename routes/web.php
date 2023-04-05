<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\ProductController;
use App\Http\Controllers\Web\FrontendController;
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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



Route::name('web.')->group(function() {

    Route::controller(ProductController::class)->group(function(){
        Route::get('product/{product}', 'single')->name('product.single');
        Route::post('product/{product}/variant', 'singleVariant')->name('product.single.variant');
        
    });


    Route::controller(FrontendController::class)->group(function(){
        Route::get('/', 'home')->name('home');
        
    });

});




