<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeExtraHour extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id', 'extra_concept_id', 'cantidad'];

    // Relación con el modelo Employee
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    // Relación con el modelo ExtraConcept
    public function extraConcept()
    {
        return $this->belongsTo(ExtraConcept::class);
    }
}

