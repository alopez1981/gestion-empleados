<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ExtraConceptController;
use App\Http\Controllers\EmployeeExtraHourController;

Route::get('/', function () {
    return redirect()->route('employees.index');
});
Route::resource('employees', EmployeeController::class);
Route::resource('extra_concepts', ExtraConceptController::class);
Route::get('employees/pdf', [EmployeeController::class, 'exportPDF'])->name('employees.pdf');
Route::get('employees/{employee}/extra_hours', [EmployeeExtraHourController::class, 'index'])->name('employee_extra_hours.index');
Route::get('employees/{employee}/extra_hours/create', [EmployeeExtraHourController::class, 'create'])->name('employee_extra_hours.create');
Route::post('employees/{employee}/extra_hours', [EmployeeExtraHourController::class, 'store'])->name('employee_extra_hours.store');
Route::delete('employees/{employee}/extra_hours/{extraHour}', [EmployeeExtraHourController::class, 'destroy'])->name('employee_extra_hours.destroy');
Route::get('/employees/{employee}/extra_hours/export', [EmployeeExtraHourController::class, 'exportToExcel'])->name('employee_extra_hours.export');
Route::get('/extra_hours/export_total_by_center', [EmployeeExtraHourController::class, 'exportTotalExtrasByCenter'])->name('extra_hours.export_total_by_center');
