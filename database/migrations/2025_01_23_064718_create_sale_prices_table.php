<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sale_prices', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('product_id'); 
            $table->string('part_no'); 
            $table->string('part_name'); 
            $table->string('model')->nullable(); 
            $table->string('variance')->nullable(); 
            $table->string('unit'); 
            $table->string('price_per_unit', 255); 
            $table->date('effective_date'); 
            $table->string('status')->default('In Progress');
            $table->softDeletes();
            $table->timestamps(); 

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sale_prices');
    }
};
