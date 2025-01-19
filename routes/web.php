<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\SlugsController;
use App\Http\Controllers\QuestionsController;
use App\Models\ClientsModel;
use App\Models\StudentsModel;
use App\Models\CompanyModel;
use App\Models\CoursesModel;
use App\Models\PromotionModel;
use App\Models\SlugsModel;
use App\Models\QuestionsModel;


            // Навигация по админке
Route::get('/clients', [ClientsController::class, 'index'])->name('clients');
Route::get('/students', [StudentsController::class, 'index'])->name('students');
Route::get('/company', [CompanyController::class, 'index'])->name('company');
Route::get('/courses', [CoursesController::class, 'index'])->name('courses');
Route::get('/Promotion', [PromotionController::class, 'index'])->name('promotion');
Route::get('/slugs', [SlugsController::class, 'index'])->name('slugs');
Route::get('/questions', [QuestionsController::class, 'index'])->name('questions');
            //Создение сущьностей
Route::post('/clients/create', [ClientsController::class, 'create'])->name('clients.create');
Route::post('/students/create', [StudentsController::class, 'create'])->name('students.create');
Route::post('/company/create', [CompanyController::class, 'create'])->name('company.create');
Route::post('/courses/create', [CoursesController::class, 'create'])->name('courses.create');
Route::post('/Promotion/create', [PromotionController::class, 'create'])->name('promotion.create');
Route::post('/slugs/create', [SlugsController::class, 'create'])->name('slugs.create');
Route::post('/questions/create', [QuestionsController::class, 'create'])->name('questions.create');
            //Редактирование сущностей
Route::post('/clients/edit', [ClientsController::class, 'edit'])->name('clients.edit');
Route::post('/students/edit', [StudentsController::class, 'edit'])->name('students.edit');
Route::post('/company/edit', [CompanyController::class, 'edit'])->name('company.edit');
Route::post('/courses/edit', [CoursesController::class, 'edit'])->name('courses.edit');
Route::post('/Promotion/edit', [PromotionController::class, 'edit'])->name('promotion.edit');
Route::post('/slugs/edit', [SlugsController::class, 'edit'])->name('slugs.edit');
Route::post('/questions/edit', [QuestionsController::class, 'edit'])->name('questions.edit');
            //Удаление сущьностей
Route::delete('/clients/{user}', [ClientsController::class, 'destroy'])->name('clients.destroy');
Route::delete('/students/{user}', [StudentsController::class, 'destroy'])->name('students.destroy');
Route::delete('/company/{item}', [CompanyController::class, 'destroy'])->name('company.destroy');
Route::delete('/courses/{item}', [CoursesController::class, 'destroy'])->name('courses.destroy');
Route::delete('/Promotion/{item}', [PromotionController::class, 'destroy'])->name('promotion.destroy');
Route::delete('/slugs/{item}', [SlugsController::class, 'destroy'])->name('slugs.destroy');
Route::delete('/questions/{item}', [QuestionsController::class, 'destroy'])->name('questions.destroy');