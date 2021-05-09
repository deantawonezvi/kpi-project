<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
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
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

/*Employees Routes*/
Route::get('/employees',[EmployeeController::class,'index'])->middleware(['auth']);
Route::get('/employee/{id}',[EmployeeController::class,'employeeIndex'])->middleware(['auth']);
Route::get('/employees/add',[EmployeeController::class,'addIndex'])->middleware(['auth']);
Route::post('/employees/add',[EmployeeController::class,'addEmployee'])->middleware(['auth']);
Route::post('/employees/update-pin',[EmployeeController::class,'updatePin'])->middleware(['auth']);
Route::post('/employees/delete',[EmployeeController::class,'deleteUser'])->middleware(['auth']);
Route::post('/employees/block',[EmployeeController::class,'blockUser'])->middleware(['auth']);
Route::post('/employees/activate',[EmployeeController::class,'activateUser'])->middleware(['auth']);
/*End of employees Routes*/


/*Departments Routes*/
Route::get('/departments',[DepartmentController::class,'index'])->middleware(['auth']);
Route::get('/department/add',[DepartmentController::class,'addIndex'])->middleware(['auth']);
Route::post('/department/add',[DepartmentController::class,'add'])->middleware(['auth']);
/*End of departments Routes*/




require __DIR__.'/auth.php';
