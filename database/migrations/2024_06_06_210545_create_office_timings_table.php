<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficeTimingsTable extends Migration
{
    public function up()
    {
        Schema::create('office_timings', function (Blueprint $table) {
            $table->id();
            $table->string('shift');
            $table->time('start_time');
            $table->time('end_time');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('office_timings');
    }
}
