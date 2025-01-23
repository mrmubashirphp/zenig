<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('part_no');
            $table->string('part_name');

            // Foreign key for type_of_products
            $table->foreignId('type_of_product_id')
                ->constrained('type_of_products')
                ->onDelete('cascade');

            $table->string('model')->nullable();

            // Foreign key for categories
            $table->foreignId('category_id')
                ->constrained('categories')
                ->onDelete('cascade');

            $table->string('variance')->nullable();
            $table->text('description')->nullable();
            $table->integer('moq')->nullable();

            // Foreign key for units
            $table->foreignId('unit_id')
                ->constrained('units')
                ->onDelete('cascade');

            $table->float('part_weight')->nullable();
            $table->string('standard_packaging')->nullable();

            $table->boolean('customer_or_supplier')->default(0); // 0 for Customer, 1 for Supplier

            // Foreign key for customers
            $table->foreignId('customer_id')
                ->nullable()
                ->constrained('customers')
                ->onDelete('cascade');

            $table->string('customer_product_code')->nullable();
            $table->boolean('have_bom')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
}
;
