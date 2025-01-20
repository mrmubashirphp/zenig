<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalDataTable extends Migration
{
    public function up()
    {
        Schema::create('personal_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('staff_id')->constrained()->onDelete('cascade');
            $table->string('gender');
            $table->string('marital_status');
            $table->string('passport');
            $table->date('passport_expiry');
            $table->string('address');
            $table->string('ethnic');
            $table->string('immigration_no');
            $table->date('immigration_expiry');
            $table->date('dob');
            $table->integer('age');
            $table->string('permit_no');
            $table->date('permit_expiry');
            $table->string('phone');
            $table->string('mobile');
            $table->string('epf_no');
            $table->string('sosco');
            $table->string('nric');
            $table->string('nationality');
            $table->string('tax_identification_no')->nullable();
            $table->decimal('base_salary', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('personal_data');
    }
}

