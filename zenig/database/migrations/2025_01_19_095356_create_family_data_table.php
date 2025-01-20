<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('family_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('staff_id');
            $table->string('spouse_name')->nullable();
            $table->string('spouse_nric')->nullable();
            $table->string('spouse_passport')->nullable();
            $table->date('spouse_passport_expiry')->nullable();
            $table->date('spouse_dob')->nullable();
            $table->integer('spouse_age')->nullable();
            $table->string('spouse_permit_no')->nullable();
            $table->date('spouse_permit_expiry')->nullable();
            $table->text('spouse_address')->nullable();
            $table->integer('children_no')->nullable();
            $table->foreign('staff_id')->references('id')->on('staff')->onDelete('cascade');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_data');
    }
};
