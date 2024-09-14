<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class EmployeeExtraHoursExport implements FromArray, WithHeadings, WithStyles
{
    protected $employee;

    public function __construct(Employee $employee)
    {
        $this->employee = $employee;
    }

    // Datos que se exportarán al Excel
    public function array(): array
    {
        $extraHours = $this->employee->extraHours()->with('extraConcept')->get();

        $data = [];

        // Fila con el nombre y centro del empleado
        $data[] = [
            'Empleado' => $this->employee->nombre . ' ' . $this->employee->apellidos,
            'Centro' => $this->employee->centro,
        ];

        // Fila vacía para separar
        $data[] = [];

        // Encabezados para las horas extras
        $data[] = ['Concepto', 'Cantidad', 'Valor por Hora', 'Importe'];

        // Agregar cada registro de horas extras
        foreach ($extraHours as $extraHour) {
            $data[] = [
                $extraHour->extraConcept->concepto,
                $extraHour->cantidad,
                number_format($extraHour->extraConcept->valor, 2),
                number_format($extraHour->cantidad * $extraHour->extraConcept->valor, 2),
            ];
        }

        // Fila para el total de horas extras
        $totalImporte = $extraHours->sum(function ($extraHour) {
            return $extraHour->cantidad * $extraHour->extraConcept->valor;
        });

        $data[] = ['Total', '', '', number_format($totalImporte, 2)]; // Sumar el total al final

        return $data;
    }

    // Encabezados del archivo Excel
    public function headings(): array
    {
        return [];
    }

    // Estilos para la hoja de cálculo
    public function styles(Worksheet $sheet)
    {
        return [
            // Hacer la primera fila (nombre y centro) en negrita
            1 => ['font' => ['bold' => true]],
            // Hacer el encabezado de las horas extras en negrita
            3 => ['font' => ['bold' => true]],
        ];
    }
}

