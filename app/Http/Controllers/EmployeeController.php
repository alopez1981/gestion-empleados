<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $orderBy = $request->get('sort', 'id');

        $employees = Employee::orderBy($orderBy)->paginate(10);

        return view('employees.index', compact('employees'));
    }


    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'dni' => 'required|unique:employees',
            'rol' => 'required',
            'centro' => 'required',
        ]);

        Employee::create($request->all());
        return redirect()->route('employees.index')->with('success', 'Empleado creado con éxito');
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'dni' => 'required|unique:employees,dni,' . $employee->id,
            'rol' => 'required',
            'centro' => 'required',
        ]);

        $employee->update($request->all());
        return redirect()->route('employees.index')->with('success', 'Empleado actualizado con éxito');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Empleado eliminado con éxito');
    }
}

