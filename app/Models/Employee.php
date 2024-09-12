<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'apellidos', 'dni', 'rol', 'centro'];
    public function extraHours()
    {
        return $this->hasMany(EmployeeExtraHour::class);
    }
}
