<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ExtraConceptController;
use App\Http\Controllers\EmployeeExtraHourController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('employees', EmployeeController::class);
Route::resource('extra_concepts', ExtraConceptController::class);
Route::get('employees/pdf', [EmployeeController::class, 'exportPDF'])->name('employees.pdf');
Route::get('employees/{employee}/extra_hours', [EmployeeExtraHourController::class, 'index'])->name('employee_extra_hours.index');
Route::get('employees/{employee}/extra_hours/create', [EmployeeExtraHourController::class, 'create'])->name('employee_extra_hours.create');
Route::post('employees/{employee}/extra_hours', [EmployeeExtraHourController::class, 'store'])->name('employee_extra_hours.store');
Route::delete('employees/{employee}/extra_hours/{extraHour}', [EmployeeExtraHourController::class, 'destroy'])->name('employee_extra_hours.destroy');


