<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;//controller
use App\Http\Controllers\UploadedBooksController;
use App\Http\Controllers\CategoryController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("Data",[BooksController::class,'getBooks']);

 //get books from database
Route::get("viewBooks",[BooksController::class,'viewBooks']);

//add books
Route::post("addBooks",[BooksController::class,'addBooks']);
//validation
Route::post("saveBooks",[BooksController::class,'saveBooks']);

//file upload
Route::post("uploadedFiles",[UploadedBooksController::class,'uploadedFiles']);

//update book details
Route::put("updateBooks",[BooksController::class,'updateBooks']);

//delete books
Route::delete("deleteBooks/{id}",[BooksController::class,'deleteBooks']);

//serach books
Route::get("serachBooks/{name}",[BooksController::class,'serachBooks']);

//category
Route::post("stroeCategory",[CategoryController::class,'store']);