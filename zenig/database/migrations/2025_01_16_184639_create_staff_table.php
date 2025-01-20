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
        Schema::create('staff', function (Blueprint $table) {
            $table->id(); 
            $table->string('code', 100)->unique(); 
            $table->string('full_name', 255); 
            $table->string('user_name', 100)->unique(); 
            $table->string('email', 255)->unique(); 
            $table->string('password', 255);
            $table->string('department', 100); 
            $table->string('designation', 100); 
            $table->longText('role'); 
            $table->boolean('is_active')->default(false); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
