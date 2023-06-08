<?php

use App\Http\Controllers\CourController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
Route::group(['middleware' => ['auth','unlock','isadmin']], function () {
    Route::resource('cours',CourController::class);
    Route::resource('episode', EpisodeController::class);
    Route::get('achatcour/{cour:slug}',[CourController::class,'achatLivre'])->name('achatLivre');
});
Route::group(['middleware'=>['auth']],function(){
    Route::get('/course/{cour:slug}', [CourseController::class, 'cours'])->name('cours');
    Route::get('/recapitulatif', [ProfileController::class, 'dashboard'])->name('recapitulatif');
    Route::get('/parametre', [ProfileController::class, 'parametre'])->name('parametre');
    Route::delete('/deleteAcount/{user}', [ProfileController::class, 'deleteAcount'])->name('deleteAcount');
    Route::put('update_profil/{user}',[UserController::class, 'updateProfil'])->name('updateProfil');
    Route::post('completide/{episode:slug}',[EpisodeController::class, 'completide'])->name('completide');
    Route::get('/courses_show/{cour:slug}', [CourseController::class, 'show'])->name('courses.show');
});
Route::post('coursearch',[CourseController::class,'seachCours'])->name('seachCours');
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
//Route::get('/desformpayante', [CourseController::class, 'payante']);
