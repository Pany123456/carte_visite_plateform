<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BusinessCardController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TemplateController;


/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Routes pour l'inscription
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [AuthController::class, 'register']);

// Routes pour la connexion
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/', function () {
    return redirect()->route('login');
});

// Routes protégées par l'authentification
Route::middleware('auth')->group(function () {

    // Route pour afficher le profil
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');

    // Route pour se déconnecter
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Route pour le dashboard (utilisation du contrôleur DashboardController)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Autres routes pour le CRUD des cartes de visite
    Route::get('/business-cards/create', [BusinessCardController::class, 'create'])->name('business-cards.create');
    Route::post('/business-cards', [BusinessCardController::class, 'store'])->name('business-cards.store');
    Route::get('/business-cards/{id}', [BusinessCardController::class, 'show'])->name('business-cards.show');

    //CRUD Utilisateurs
    Route::resource('users', UserController::class);

    Route::get('/preview-template/{path}', [TemplateController::class, 'preview'])
    ->where('path', '.*')
    ->name('template.preview');

     //CRUD Template

     Route::resource('templateCrud', TemplateController::class);

});

    Route::get('/templates/{templateName}', [TemplateController::class, 'show']);

