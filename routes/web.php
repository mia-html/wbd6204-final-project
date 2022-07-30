<?php

use App\Http\Controllers\RecipeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\Recipe;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// ALL RECIPES
Route::get('/', [RecipeController::class, 'index']);

// CREATE FORM
Route::get('/recipes/create', [RecipeController::class, 'create'])->middleware('auth');

// STORE DATA
Route::post('/recipes', [RecipeController::class, 'store'])->middleware('auth');

// EDIT POST
Route::get('/recipes/{recipe}/edit', [RecipeController::class, 'edit'])->middleware('auth');

// UPDATE POST
Route::put('/recipes/{recipe}', [RecipeController::class, 'update'])->middleware('auth');

// DELETE POST
Route::delete('/recipes/{recipe}', [RecipeController::class, 'delete'])->middleware('auth');

// MANAGE POSTS
Route::get('/recipes/manage', [RecipeController::class, 'manage'])->middleware('auth');

// SINGLE RECIPE
Route::get('/recipes/{recipe}', [RecipeController::class, 'show']);

// REGISTER FORM
Route::get('/register', [UserController::class, 'register'])->middleware('guest');

// NEW USER
Route::post('/users', [UserController::class, 'store']);

// LOGOUT USER
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// LOGIN FORM
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// LOGIN USER
Route::post('/users/loggingin', [UserController::class, 'loggingin']);

