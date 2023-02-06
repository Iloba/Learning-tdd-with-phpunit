<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\TeacherController;
use App\Models\Result;
use App\Models\Product;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/services', function () {
    return view('services');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/faq', function () {
    return view('faq');
});

Route::get('/products', function () {
    $products = Product::all();
    return view('products', [
        'products' => $products
    ]);
});

Route::get('/music', function () {
    return view('music');
});

Route::get('/results', function () {
    $results = Result::all();
    return view('results', [
        'results' => $results
    ]);
});

Route::get('/students', function () {
    $students = Student::all();
    return view('students', [
        'students' => $students
    ]);
});

Route::get('/register', function () {
    return view('register');
});

Route::post('register-candidate', [CandidateController::class, 'store'])->name('candidate.register');

Route::get('teachers', function () {
    return view('register_teachers');
});

Route::post('register-teacher', [TeacherController::class, 'store'])->name('register.teacher');