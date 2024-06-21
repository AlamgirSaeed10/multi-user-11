<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'business_name',
        'website_link',
        'customer_email',
        'customer_phone',
        'customer_city',
        'customer_address',
        'customer_postcode',
        'customer_task',
        'task_description',
    ];
}

