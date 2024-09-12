<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeExtraHour;
use App\Models\ExtraConcept;
use Illuminate\Http\Request;

class EmployeeExtraHourController extends Controller
{
    public function index($employee_id)
    {
        $employee = Employee::findOrFail($employee_id);

        $extraHours = $employee->extraHours()->with('extraConcept')->get();

        $totalHoras = 0;
        $totalImporte = 0;

        foreach ($extraHours as $extraHour) {
            $totalHoras += $extraHour->cantidad; // Suma de horas
            $totalImporte += $extraHour->cantidad * $extraHour->extraConcept->valor; // Suma de importes
        }

        return view('employee_extra_hours.index', compact('employee', 'extraHours', 'totalHoras', 'totalImporte'));
    }


    public function create($employee_id)
    {
        $employee = Employee::findOrFail($employee_id);
        $concepts = ExtraConcept::all(); // Obtener todos los conceptos configurados
        return view('employee_extra_hours.create', compact('employee', 'concepts'));
    }

    public function store(Request $request, $employee_id)
    {
        $request->validate([
            'extra_concept_id' => 'required|exists:extra_concepts,id',
            'cantidad' => 'required|numeric|min:0.01',
        ]);

        $employee = Employee::findOrFail($employee_id);
        $employee->extraHours()->create($request->all());

        return redirect()->route('employee_extra_hours.index', $employee_id)->with('success', 'Horas extras añadidas con éxito');
    }

    public function destroy($employee_id, $extraHour_id)
    {
        $extraHour = EmployeeExtraHour::where('employee_id', $employee_id)->findOrFail($extraHour_id);
        $extraHour->delete();

        return redirect()->route('employee_extra_hours.index', $employee_id)->with('success', 'Hora extra eliminada con éxito');
    }
}

