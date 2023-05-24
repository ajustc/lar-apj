<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\EventMemberController;
use App\Http\Controllers\LandingPagesController;
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

// Route::get('/', function () {
//     return view('welcome');
// });



// Adminpages
Route::prefix('adminpages')->group(function () {
    Route::resource('events', EventController::class);
    Route::resource('event_members', EventMemberController::class);
});

// Landingpages
Route::get('/', [LandingPagesController::class, 'home']);
Route::post('/create-member-event', [LandingPagesController::class, 'post']);