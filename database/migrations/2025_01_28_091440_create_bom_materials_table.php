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
        Schema::create('bom_materials', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD:database/migrations/2025_01_22_111532_create_quotations_table.php
            $table->unsignedBigInteger('customer_id');
            $table->date('date');
            $table->string('created_by');
            $table->string('term');
            $table->string('cc');
            $table->string('department');
            $table->string('ref_no'); 
            $table->softDeletes();
=======
            $table->unsignedBigInteger('bom_id');
            $table->foreign('bom_id')->references('id')->on('boms');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->string('qty_length');
>>>>>>> 5f119deee24ce5c6c16485a8c49c555894979665:database/migrations/2025_01_28_091440_create_bom_materials_table.php
            $table->timestamps();
        
            // Foreign key constraint
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
        
        }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bom_materials');
    }
};
