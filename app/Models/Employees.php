<?php

namespace App\Models;

use App\Models\Attendance;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employees extends Model
{
    use HasFactory;

    protected $fillable = [
        'EmployeeCode', 'FirstName', 'LastName', 'DateOfBirth', 'FatherName', 'ContactNo',
        'CNIC', 'Gender', 'Email', 'Qualification', 'MaterialStatus', 'Department',
        'Designation', 'Shift', 'JoiningDate', 'Address', 'EmergencyContactName',
        'EmergencyContactRelation', 'EmergencyContactNo', 'EmergencyContactAddress',
        'BankName', 'BankIBAN', 'AccHolderName', 'EmployeeImage','Password' ,'Role', 'ActiveStatus'
    ];

    protected $hidden = [
        'Password', // Hide password field by default
    ];


    public function setPasswordAttribute($value)
    {
        $this->attributes['Password'] = Hash::make($value);
    }


    public function getFullNameAttribute()
    {
        return "{$this->FirstName} {$this->LastName}";
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'employee_id', 'EmployeeCode');
    }
}
