<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('EmployeeCode')->unique();
            $table->string('FirstName');
            $table->string('LastName');
            $table->date('DateOfBirth');
            $table->string('FatherName');
            $table->string('ContactNo');
            $table->string('CNIC')->unique();
            $table->string('Gender');
            $table->string('Email')->unique();
            $table->string('Qualification');
            $table->string('MaterialStatus');
            $table->string('Department');
            $table->string('Designation');
            $table->string('Shift');
            $table->date('JoiningDate');
            $table->string('Address');
            $table->string('EmergencyContactName');
            $table->string('EmergencyContactRelation');
            $table->string('EmergencyContactNo');
            $table->string('EmergencyContactAddress');
            $table->string('BankName');
            $table->string('BankIBAN');
            $table->string('AccHolderName');
            $table->string('EmployeeImage')->nullable();
            $table->integer('ActiveStatus')->default(1);
            $table->string('Role');
            $table->string('Password')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
