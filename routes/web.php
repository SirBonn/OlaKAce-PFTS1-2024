<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\publisherController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\rolAuthMiddleware;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('main');
    }
    return view('welcome');
})->name('welcome');

Route::get('/home', function () {
    return view('welcome');
})->name('home');

Route::resource('users', UsersController::class);

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('home');
});

Auth::routes();

Route::post('/login', [LoginController::class, 'authenticate'])->name('login');

Route::get('/main', [RolesController::class, 'index'])->name('main');


Route::middleware(rolAuthMiddleware::class . ':guest, visitor')->group(function () {
    Route::get('/guest', [UsersController::class, 'index'])->name('guest');
    Route::post('/report/post', [ReportController::class, 'store'])->name('report.post');
    Route::get('/asist/{id_event}', [PublisherController::class, 'attend'])->name('attend');
    Route::get('/noasist/{id_event}', [PublisherController::class, 'noAttend'])->name('noattend');

});

Route::middleware(rolAuthMiddleware::class . ':poster')->group(function(){
    Route::get('/poster', [PublisherController::class, 'index'])->name('publisher');
    Route::post('/insert/post', [PublisherController::class, 'store'])->name('insert.post');
    Route::get('/attend/{id_event}', [PublisherController::class, 'viewAttend'])->name('view.attend');
});

Route::middleware(rolAuthMiddleware::class . ':admin')->group(function () {
    Route::get('/admin', [adminController::class, 'index'])->name('admin');
    Route::get('/admin/requests', [adminController::class, 'requests'])->name('admin.requests');
    Route::get('/admin/requests/{id}', [adminController::class, 'show'])->name('users.show');
    Route::get('/admin/report/{id}', [ReportController::class, 'show'])->name('report.show');
    Route::get('/admin/report/acept/{id}', [ReportController::class, 'aceptRep'])->name('acept.report');
    Route::get('/admin/report/decline/{id}', [ReportController::class, 'declineRep'])->name('decline.report');

    Route::get('/admin/decline/{id}', [adminController::class, 'declinePost'])->name('decline.post');
    Route::get('/admin/public/{id}', [adminController::class, 'aceptPost'])->name('acept.post');
    Route::get('/admin/reports', [adminController::class, 'reports'])->name('admin.reports');
    Route::get('/admin/banlist', [adminController::class, 'banList'])->name('admin.banlist');
    Route::post('/insert/category', [CategoriesController::class, 'store'])->name('insert.category');
    Route::post('/insert/people', [PeopleController::class, 'store'])->name('insert.people');
});
