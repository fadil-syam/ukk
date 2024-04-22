<?php

use App\Http\Controllers\bookController;
use App\Http\Controllers\bookPostController;
use App\Http\Controllers\borrowController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\rekapController;
use App\Http\Controllers\reviewController;
use App\Http\Controllers\sesiController;
use App\Models\Category;
use App\Models\User;
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

// Route::get('/', function () {
//     return view('books.books', [
//         "active" => "home",
//     ]);
// })->middleware('auth');

Route::get('/', [bookController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('books/{book:slug}', [bookController::class, 'show']);


Route::get('/categories', function() {
    return view('categori.categories', [
        'tittle' => 'Post Categories',
        "active" => "categories",
        'categories' => Category::all(),
    ]);
})->middleware('auth');

Route::get('/categories/{category:slug}', function(Category $category) {
    return view('books.books', [
        'tittle' => "Post by Category : $category->name",
        "active" => "categories",
        'books' => $category->books->load('category', 'author'),
    ]);
}) ->middleware('auth');

// Route::get('/authors/{author:username}', function(User $author) {
//     return view('books.books', [
//         'tittle' => "Post By Author : $author->name",
//         "active" => "categories",
//         'books' => $author->books->load('category', 'author'),
//     ]);
// });

Route::resource('post', bookPostController::class)->middleware('auth');
// Route::post('borrows', [borrowController::class, 'store']);
Route::get('posts/{book:slug}', [bookPostController::class, 'show'])->middleware('auth');
Route::get('edit/{book:slug}', [bookPostController::class, 'edit'])->middleware('auth');
Route::put('update/{book:slug}', [bookPostController::class, 'update'])->middleware('auth');
Route::delete('delete/{book:slug}', [bookPostController::class, 'destroy']);
Route::get('/checkSlug', [bookPostController::class, 'checkSlug']);


Route::get('borrows', [borrowController::class, 'index'])->middleware('auth');
Route::post('borrows', [borrowController::class, 'store']);
Route::post('status/{borrow:id}', [borrowController::class, 'status']);
Route::put('tambah/{borrow:id}', [borrowController::class, 'update'])->middleware('auth');

Route::get('borrows/export/excel', [borrowController::class, 'exsport_excel']);
Route::get('borrowsAdmin', [borrowController::class, 'showAdmin'])->middleware('auth');


Route::resource('reviews', reviewController::class)->middleware('auth');
// Route::get('reviews', [reviewController::class, 'index']);
// Route::post('reviews', [reviewController::class, 'store']);
// Route::delete('deleteReviews/{review:rating}', [reviewController::class, 'destroy']);
// Route::middleware('auth')->get('/user-id', function () {
//     return view('user_id');
// });
// Route::get('rekap', [rekapController::class, 'index']);
// Route::get('borrows/export/excel', [rekapController::class, 'exsport_excel']);

Route::get('/login', [sesiController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [sesiController::class, 'authenticate']);
Route::post('/logout', [sesiController::class, 'logout']);
Route::get('/profile', [sesiController::class, 'profile']);

Route::get('/register', [sesiController::class, 'create'])->middleware('guest');
Route::post('/register', [sesiController::class, 'store']);








