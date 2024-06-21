<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class EmployeesLogin extends Model
{
    use HasFactory;

    protected $fillable = [
        'EmployeeCode', 'FirstName', 'LastName', 'Email', 'Role', 'Password', 'ActiveStatus'
    ];

    protected $hidden = [
        'Password',
    ];
}

