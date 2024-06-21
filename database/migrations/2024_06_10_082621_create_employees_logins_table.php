<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesLoginsTable extends Migration
{
    public function up()
    {
        Schema::create('employees_logins', function (Blueprint $table) {
            $table->id();
            $table->string('EmployeeCode')->unique();
            $table->string('FirstName');
            $table->string('LastName');
            $table->string('Email')->unique();
            $table->string('Role');
            $table->string('Password');
            $table->integer('ActiveStatus')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees_logins');
    }
}
