<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseVideoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubscribeTransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/details/{course:slug}', [FrontController::class, 'details'])->name('front.details');
Route::get('/category/{category:slug}', [FrontController::class, 'category'])->name('front.category');
Route::get('/pricing', [FrontController::class, 'pricing'])->name('front.pricing');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/checkout', [FrontController::class, 'checkout'])->name('front.checkout')->middleware('role:student');
    Route::post('/checkout/store', [FrontController::class, 'checkout_store'])->name('front.checkout.store')->middleware('role:student');
    Route::get('/learning/{course}/{courseVideoId}', [FrontController::class, 'learning'])->name('front.learning')->middleware('role:owner|teacher|student');


    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('categories', CategoryController::class)->middleware('role:owner');
        Route::resource('teachers', TeacherController::class)->middleware('role:owner');
        Route::resource('courses', CourseController::class)->middleware('role:owner|teacher');
        Route::resource('subscribe-transactions', SubscribeTransactionController::class)->middleware('role:owner');
        Route::get('student-subscription', [SubscribeTransactionController::class, 'student'])->name('student-subscription')->middleware('role:student');
        Route::get('student-subscription/{subscribeTransaction}', [SubscribeTransactionController::class, 'student_show'])->name('student-subscription.show')->middleware('role:student');

        Route::get('/add/video/{course:id}', [CourseVideoController::class, 'create'])
            ->middleware('role:teacher|owner')
            ->name('course.add_video');

        Route::post('/add/video/save/{course:id}', [CourseVideoController::class, 'store'])
            ->middleware('role:teacher|owner')
            ->name('course.add_video.save');

        Route::resource('course-videos', CourseVideoController::class)->middleware('role:owner|teacher');
    });

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

require __DIR__ . '/auth.php';
