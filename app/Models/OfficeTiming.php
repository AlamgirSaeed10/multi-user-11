<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficeTiming extends Model
{
    use HasFactory;

    protected $fillable = [
        'shift',
        'start_time',
        'end_time',
    ];
}
