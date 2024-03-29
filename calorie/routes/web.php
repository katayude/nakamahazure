<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecodeController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\DairyController;
use App\Http\Controllers\NutritionController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\ChatGptController;
use App\Http\Controllers\User_informationController;

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

Route::get('/chat', [ChatGptController::class, 'chat'])->name('chat_gpt-chat');
Route::get('/dashboard', [ChatGptController::class, 'index'])->name('chat_gpt-index');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/trainings', [TrainingController::class, 'store'])->name('training.store');
    Route::get('/calendar', [CalendarController::class, 'show'])->name('calendar');
    Route::get('/input', [RecodeController::class, 'input'])->name('calorie.input');
    Route::post('/daily', [DairyController::class, 'store'])->name('daily.store');
    Route::get('/edit', [RecodeController::class, 'edit'])->name('recode.edit');
    Route::get('/edit/data', [RecodeController::class, 'showData'])->name('data.show');
    Route::get('/edit/date', [RecodeController::class, 'showDate'])->name('date.show');
    Route::post('/edit/submitUserData', [RecodeController::class, 'submitForm'])->name('submitUserData');
    Route::Delete('/edit/deleteFood/{id}', [RecodeController::class, 'deleteFood'])->name('food.delete');
    Route::Delete('/edit/deleteTraining/{id}', [RecodeController::class, 'deleteTraining'])->name('training.delete');
    Route::Delete('/edit/deleteToday/{id}', [RecodeController::class, 'deleteToday'])->name('today.delete');
    Route::Delete('/edit/deleteDairy/{id}', [RecodeController::class, 'deleteDairy'])->name('dairy.delete');
    Route::get('/dashboard/{date}', [NutritionController::class, 'show'])->name('dashboardWithDate');
    Route::post('/food', [FoodController::class, 'store'])->name('food.store');
    Route::post('/chat/information', [User_informationController::class, 'store'])->name('user_information.store');
    Route::get('/information', [RecodeController::class, 'infor'])->name('information');
});

require __DIR__ . '/auth.php';
