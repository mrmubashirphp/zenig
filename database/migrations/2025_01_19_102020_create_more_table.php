<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
       public function up()
{
    Schema::create('mores', function (Blueprint $table) {
        $table->id();
        $table->foreignId('staff_id')->constrained()->onDelete('cascade'); // Associate with staff
        // Emergency contact fields
        $table->string('emergency_name');
        $table->string('relationship');
        $table->string('address');
        $table->string('phone_no');
        // Leave details fields
        $table->date('annual_leave');
        $table->integer('annual_balance');
        $table->integer('carried_leave');
        $table->integer('carried_balance');
        $table->date('medical_leave');
        $table->integer('medical_balance');
        $table->integer('unpaid_leave');
        $table->integer('unpaid_balance');
        $table->integer('total_leave_days');
        $table->decimal('charges_exceeded', 8, 2);
        $table->timestamps();
    });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('more');
    }
};
