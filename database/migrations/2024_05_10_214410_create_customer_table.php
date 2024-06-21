<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('business_name')->nullable();
            $table->string('website_link')->nullable();
            $table->string('customer_email')->unique();
            $table->string('customer_phone');
            $table->string('customer_city');
            $table->string('customer_address');
            $table->string('customer_postcode');
            $table->string('customer_task');
            $table->text('task_description');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
