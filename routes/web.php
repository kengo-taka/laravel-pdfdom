<?php

use App\Http\Controllers\DompdfController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('home');
});

Route::post('/dompdf/pdf', [DompdfController::class,'generatePDF'])->name('dompdf.generate-pdf');

Route::post('/dompdf/html', [DompdfController::class,'showHTML'])->name('dompdf.show-html');