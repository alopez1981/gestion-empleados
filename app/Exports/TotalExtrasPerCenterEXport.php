<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TotalExtrasPerCenterExport implements FromArray, WithHeadings, WithStyles
{
    public function array(): array
    {
        // Obtener todos los empleados con sus horas extras
        $employees = Employee::with(['extraHours.extraConcept'])->get();

        // Agrupar las horas extras por centro
        $data = [];
        $totals = [];

        foreach ($employees as $employee) {
            foreach ($employee->extraHours as $extraHour) {
                $center = $employee->centro;

                // Inicializar el total del centro si no existe
                if (!isset($totals[$center])) {
                    $totals[$center] = 0;
                }

                // Sumar la cantidad de horas extras por concepto y valor
                $totals[$center] += $extraHour->cantidad * $extraHour->extraConcept->valor;
            }
        }

        // Crear filas para cada centro y su total de horas extras
        foreach ($totals as $center => $total) {
            $data[] = [
                'Centro' => $center,
                'Total Horas Extras' => number_format($total, 2),
            ];
        }

        return $data;
    }

    // Encabezados del archivo Excel
    public function headings(): array
    {
        return [
            'Centro',
            'Total Horas Extras',
        ];
    }

    // Estilos para la hoja de cálculo
    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]], // Encabezados en negrita
        ];
    }
}

