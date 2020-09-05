<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckIsAdmin;
use App\Http\Middleware\CheckIsLogged;

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
Route::middleware([CheckIsLogged::class])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/loans/{bookId}', 'LoanController@create');

    Route::get('/loans', 'LoanController@index');

    Route::post('/loans/{bookCopyId}', 'LoanController@store');
    
    
    Route::put('/loans/{id}', 'LoanController@update');

    Route::get('/my-loans', 'LoanController@myLoans');


    Route::get('/books', 'BookController@index');

    
    Route::get('/books/edit/{id}', 'BookController@edit');
    
    Route::put('/books/{id}', 'BookController@update');

    Route::get('/bookCopy/create/{bookId}', 'BookCopyController@create');

    Route::post('/bookCopy/create/{bookId}', 'BookCopyController@store');
    
    Route::get('/bookCopy/list/{bookId}', 'BookCopyController@list');

    Route::get('/bookCopy', 'BookCopyController@index');

    Route::post('/bookCopy', 'BookCopyController@store');
    
    Route::get('/bookCopy/edit/{id}', 'BookCopyController@edit');
    
    Route::post('/bookCopy/{id}', 'BookCopyController@update');
});

Route::middleware([CheckIsAdmin::class])->group(function () {
    Route::get('/users', 'UserController@index');

    Route::get('/users/create/{employeeId}', 'UserController@create');
    
    Route::post('/users/create/{employeeId}', 'UserController@store');
    
    Route::get('/users/delete/{id}', 'UserController@destroy');
    
    Route::get('/users/edit/{id}', 'UserController@edit');
    
    Route::post('/users/{id}', 'UserController@update');

    Route::get('/employees', 'EmployeeController@index');

    Route::get('/employees/create', 'EmployeeController@create');
    
    Route::post('/employees', 'EmployeeController@store');
    
    Route::get('/employees/delete/{id}', 'EmployeeController@destroy');
    
    Route::get('/employees/edit/{id}', 'EmployeeController@edit');
    
    Route::post('/employees/{id}', 'EmployeeController@update');

    Route::get('/books/create', 'BookController@create');

    Route::post('/books', 'BookController@store');

    Route::get('/loans/finish/{id}', 'LoanController@finish');

});

Route::post('/login', 'LoginController@login')->name('login');

Route::get('/login', 'LoginController@index')->name('login-page');

Route::get('/logout', 'LoginController@logout')->name('logout');