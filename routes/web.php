<?php

use App\Http\Controllers\Course\courseController;
use App\Http\Controllers\semester\semesterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
route::get('create/semester',[semesterController::class,'create'])->name('create.semester');
route::post('store/semester',[semesterController::class,'store'])->name('store.semester');
route::get('semester/index',[semesterController::class,'index'])->name('index.semester');
ROUTE::GET('semester/Edit/{id}',[semesterController::class,'Edit'])->name('edit.semester');
ROUTE::put('semester/updata{id}',[semesterController::class,'update'])->name('updata.semester');
ROUTE::GET('semester/delete{id}',[semesterController::class,'delete'])->name('delete.semester');
Route::get('course/create',[courseController::class,'create'])->name('Create.course');
Route::post('course/store',[courseController::class,'store'])->name('store.course');
Route::get('course/index',[courseController::class,'index'])->name('index.course');
Route::get('course/edit/{id}',[courseController::class,'edit'])->name('edit.course');
Route::put('course/update/{id}',[courseController::class,'update'])->name('update.course');
Route::delete('course/delete/{id}',[courseController::class,'delete'])->name('delete.course');
Route::delete('course/restore/{id}',[courseController::class,'restore'])->name('restore.course');
Route::get('alldeleted',[courseController::class,'alldeleted'])->name('alldeleted.course');
