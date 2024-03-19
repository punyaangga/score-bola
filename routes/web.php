<?php

use App\Http\Controllers\MasterDataClubController;
use App\Http\Controllers\ScoreController;
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
//     return view('MainMenu.Index');
// });
Route::redirect('/', '/master_data_clubs');
Route::resource('master_data_clubs', MasterDataClubController::class);
Route::resource('scores', ScoreController::class);
