<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeasisController;
use App\Http\Controllers\IdeasisCommentController;
use App\Http\Controllers\CreateIdeasisController;
use App\Http\Controllers\IdeasislikeController;


Route::get('/', [AuthController::class, 'Index'])->name('login');
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('dashboard', [dashboardController::class, 'dashboard']); 
Route::get('Home', [dashboardController::class, 'dashboard'])->name('home');
Route::get('Overview', [dashboardController::class, 'overview'])->name('overview');
Route::get('Message', [dashboardController::class, 'Message'])->name('message');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('Neighborhood', [AuthController::class, 'Neighborhood'])->name('Neighborhood');


// Route::resource('ideasis', IdeasisController::class);
Route::get('ideasis', [AuthController::class, 'Index'])->name('ideasis.index');
Route::get('create_ideasi', [CreateIdeasisController::class, 'Index'])->name('ideasis.create');
Route::post('saveideasi', [IdeasisController::class, 'store'])->name('ideasis.store');

Route::get('Myideasi', [IdeasisController::class, 'myideasi'])->name('my.ideasi');
Route::get('ideasis_{id}', [IdeasisController::class, 'show'])->name('ideasis.show');
Route::get('ideasis2_{id}', [IdeasisController::class, 'show2'])->name('ideasis.show2');
Route::get('ideasisedit_{id}', [IdeasisController::class, 'edit'])->name('ideasis.edit');
Route::put('ideasisupt/{id}', [IdeasisController::class, 'update'])->name('ideasis.update');
Route::delete('ideasis_{id}', [IdeasisController::class, 'destroy'])->name('ideasis.destroy');

Route::post('postcomment', [IdeasisCommentController::class, 'store'])->name('comments.store');
Route::post('postlike', [IdeasislikeController::class, 'storeLike'])->name('like.store');
Route::post('/like', [ideasisLikeController::class, 'toggleLike'])->name('like.toggle');


Route::get('profile', [AuthController::class, 'profile'])->name('profile');
Route::post('updateprofile', [AuthController::class, 'updateprofile'])->name('user.updateProfile');
Route::post('updatedataprofile', [AuthController::class, 'updatedataprofile'])->name('user.updatedataProfile');

Route::get('password', [AuthController::class, 'password'])->name('password');
Route::get('/change-password', [AuthController::class, 'showChangePasswordForm'])->name('user.showChangePasswordForm');
Route::post('/change-password', [AuthController::class, 'changePassword'])->name('user.changePassword');
