<?php

use App\Models\Estudiante;
use App\Http\Livewire\Student;
use App\Http\Livewire\Subjects;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\EstudianteController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/students', Student::class)->name('students');
    Route::get('/subjects', Subjects::class)->name('subjects');
    Route::get('/addstudent', function () {
        return view('addstudent');
    })->name('addstudent');
    Route::post('/addstudent', [EstudianteController::class, 'store'] );


    Route::get('/editstudent/{id}', function ($id) {
        $datos= Estudiante::find($id);
        return view('editstudent', ['studiante'=>$datos ] );
    })->name('editstudent');

     Route::get('/editstudent2/{id}', [EstudianteController::class, 'update'] )->name('editstudent2');
     Route::get('/deletestudent/{id}', function ($id) {
        $datos= Estudiante::find($id);
        $datos->delete();
        return Redirect::to('students');

        // return view('editstudent', ['studiante'=>$datos ] );
    })->name('deletestudent');


});
