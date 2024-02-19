<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MypageController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // 投稿関連のルーティング(URL)
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
    
    // マイページ関連のルーティング
    Route::get('/mypage', [MypageController::class, 'index'])->name('mypage.index');
    Route::get('/mypage/create', [MypageController::class, 'create'])->name('mypage.create');
    Route::post('/mypage/weight/store', [MypageController::class, 'weight_store'])->name('mypage.weight.store');
    Route::get('/mypage/weight/edit/{health}', [MypageController::class, 'weight_edit'])->name('mypage.weight.edit');
    Route::put('/mypage/weight/update/{health}', [MypageController::class, 'weight_update'])->name('mypage.weight.update');
    Route::post('/mypage/meal/store', [MypageController::class, 'meal_store'])->name('mypage.meal.store');
    Route::get('/mypage/weight/month', [MypageController::class, 'weight_month'])->name('mypage.weight.month');
});

require __DIR__.'/auth.php';
