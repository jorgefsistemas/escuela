<?php


use App\Models\Materia;
use App\Models\Estudiante;
use App\Http\Livewire\Student;
use App\Http\Livewire\Subjects;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\UserController;

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
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class)->middleware('auth:sanctum');
    Route::resource('permissions', PermissionController::class);


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
    // rutas para materias

    Route::get('/addsubject', function () {
        return view('addsubject');
    })->name('addsubject');
    Route::post('/addsubject', [MateriaController::class, 'store'] );
    Route::get('/editsubject/{id}', function ($id) {
        $datos= Materia::find($id);
        return view('editsubject', ['materia'=>$datos ] );
    })->name('editsubject');
     Route::get('/editsubject2/{id}', [MateriaController::class, 'update'] )->name('editsubject2');
     Route::get('/deletesubject/{id}', function ($id) {
        $datos= Materia::find($id);
        $datos->delete();
        return Redirect::to('subjects');
    })->name('deletesubject');





});
