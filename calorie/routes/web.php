<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecodeController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\DairyController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard/recode/create', function () {
    return view('recode/create');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/{date}', function () {
    $date = request('date'); // クエリパラメータから日付を取得
    return view('dashboard', ['date' => $date]);
})->name('dashboardWithDate');

Route::get('/calendar', function () {
    return view('calendar');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/trainings', [TrainingController::class, 'store'])->name('training.store');
    Route::get('/calendar', [CalendarController::class, 'show'])->name('calendar');
    Route::get('/input', [RecodeController::class, 'input'])->name('calorie.input');
    Route::post('/daily', [DairyController::class, 'store'])->name('daily.store');
    Route::get('/edit', [RecodeController::class, 'edit'])->name('recode.edit');
    
});

require __DIR__ . '/auth.php';
