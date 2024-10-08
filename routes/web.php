<?php

use App\Http\Controllers\student_controller;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\track_controller;
use App\Models\Students;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\course_controller;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/students', [student_controller::class, 'index'])->name('students.index');
Route::get('/students/{id}', [student_controller::class, 'showOne'])->name('students.showOne');
Route::delete('delete/{id}', [student_controller::class, 'destroy'])->name('students.destroy');
Route::get('/students/{id}/create', [student_controller::class, 'create'])->name('students.create');
Route::post('/students/store', [student_controller::class, 'store'])->name('students.store');
Route::get('/students/{id}/edit', ([student_controller::class, 'edit']))->name('students.edit');
Route::Put('/students/{id}/update', ([student_controller::class, 'update']))->name('students.update');



Route::get('/tracks', [track_controller::class, 'index'])->name('tracks.index');
Route::get('/tracks/{id}', [track_controller::class, 'trackview'])->name('tracks.trackview');
Route::delete('/trackDelete/{id}', [track_controller::class, 'destroy'])->name('tracks.destroy');
Route::get('/tracks/{id}/createtrack', [track_controller::class, 'createtrack'])->name('tracks.createtrack');
Route::post('/tracks/store', [track_controller::class, 'store'])->name('tracks.store');
Route::get('/tracks/{id}/edit_track', ([track_controller::class, 'edit_track']))->name('tracks.edit_track');
Route::put('/tracks/{id}/update_track', ([track_controller::class, 'update_track']))->name('tracks.update_track');

Route::resource('courses', course_controller::class);
