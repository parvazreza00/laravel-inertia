<?php

use App\Http\Controllers\ContactController;
use App\Models\Contactmessage;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
Route::get('/', function(){
    return Inertia::render('Welcome');
});
// Route::get('/about', function(){
//     return Inertia::render('About');
// });

Route::get('/students', [ContactController::class,'index']);
Route::get('/student/create', [ContactController::class,'create']);
Route::post('/student/store', [ContactController::class,'store']);
Route::delete('/student/{id}' ,[ContactController::class, 'student_destroy']);

Route::get('/student/{id}' ,[ContactController::class, 'student_edit']);
Route::post('/student/update/{id}', [ContactController::class, 'update_student']);
Route::get('/student/{id}/view' ,[ContactController::class, 'student_view']);

// Route::post('/contact/store', [ContactController::class,'store']);
