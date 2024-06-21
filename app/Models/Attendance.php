<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = ['employee_id', 'date', 'in_time', 'out_time', 'status'];

    public function employee()
    {
        return $this->belongsTo(Employees::class, 'employee_id', 'EmployeeCode');
    }
}
