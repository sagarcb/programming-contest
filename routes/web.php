<?php

use App\Http\Controllers\Admin\ContestController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FrontendComponentsController;
use App\Http\Controllers\Admin\NoticesController;
use App\Http\Controllers\Admin\TeamsController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\ProfileController;
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

/*Frontend Routes*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/registration', [HomeController::class, 'registration'])->name('registration');
Route::post('/registration', [HomeController::class, 'create'])->name('registration');
Route::get('/email-verification/{token}', [HomeController::class, 'verifyEmail'])->name('verifyEmail');
Route::get('/verification-info-page', [HomeController::class, 'verificationInfoPage'])->name('verificationInfoPage');
Route::get('/notices', [HomeController::class, 'notices'])->name('noticesList');
Route::get('/teams', [HomeController::class, 'teams'])->name('teamsList');
/*Frontend Routes*/

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    /*Notices*/
    Route::prefix('notices')->group(function () {
       Route::get('/', [NoticesController::class, 'index'])->name('notices');
       Route::get('/add', [NoticesController::class, 'add'])->name('notices.add');
       Route::post('/create', [NoticesController::class, 'create'])->name('notices.create');
       Route::get('/edit/{notice}', [NoticesController::class, 'edit'])->name('notice.edit');
       Route::patch('/edit/{notice}', [NoticesController::class, 'update'])->name('notice.edit');
       Route::delete('delete/{notice}', [NoticesController::class, 'delete'])->name('notice.delete');
    });
    /*Notices*/

    /*Contests*/
    Route::prefix('contest')->group(function () {
       Route::get('/', [ContestController::class, 'index'])->name('contests');
       Route::get('/add', [ContestController::class, 'add'])->name('contest.add');
       Route::post('/add', [ContestController::class, 'create'])->name('contest.create');
       Route::get('/edit/{contest}', [ContestController::class, 'edit'])->name('contest.edit');
       Route::patch('/edit/{contest}', [ContestController::class, 'update'])->name('contest.update');
       Route::patch('/delete/{contest}', [ContestController::class, 'delete'])->name('contest.delete');
       Route::get('/change-status/{contest}', [ContestController::class, 'changeActiveStatus'])->name('contest.changeStatus');
    });
    /*Contests*/

    /*Teams List*/
    Route::prefix('team')->group(function () {
        Route::get('/', [TeamsController::class, 'index'])->name('teams');
        Route::post('/approve/{teamInfo}', [TeamsController::class, 'updateAdminApproval'])->name('adminApproval');
        Route::delete('/delete/{teamInfo}', [TeamsController::class, 'delete'])->name('team.delete');
        Route::get('/edit/{teamInfo}', [TeamsController::class, 'edit'])->name('team.edit');
        Route::patch('/edit/{teamInfo}', [TeamsController::class, 'update'])->name('team.edit');
    });
    /*Teams List*/

    /*Image sliders*/
    Route::prefix('hero-slider')->group(function () {
       Route::get('/', [FrontendComponentsController::class, 'heroSliderList'])->name('heroSliders');
       Route::get('/add', [FrontendComponentsController::class, 'heroSliderAdd'])->name('heroSliderAdd');
       Route::post('/add', [FrontendComponentsController::class, 'heroSliderCreate'])->name('heroSliderAdd');
       Route::get('/edit/{heroSlider}', [FrontendComponentsController::class, 'heroSliderEdit'])->name('heroSliderEdit');
       Route::patch('/edit/{heroSlider}', [FrontendComponentsController::class, 'heroSliderUpdate'])->name('heroSliderEdit');
       Route::delete('/delete/{heroSlider}', [FrontendComponentsController::class, 'heroSliderDelete'])->name('heroSliderDelete');
    });
    /*Image sliders*/

    Route::prefix('slider-image')->group(function () {
       Route::get('/', [FrontendComponentsController::class, 'sliderImageList'])->name('sliderImages');
       Route::get('/add', [FrontendComponentsController::class, 'sliderImageAdd'])->name('sliderImage.add');
       Route::post('/add', [FrontendComponentsController::class, 'sliderImageStore'])->name('sliderImage.add');
       Route::delete('/delete/{sliderImage}', [FrontendComponentsController::class, 'sliderImageDelete'])->name('sliderImage.delete');
    });

    /*Profile*/
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    /*Profile*/
});

require __DIR__.'/auth.php';
