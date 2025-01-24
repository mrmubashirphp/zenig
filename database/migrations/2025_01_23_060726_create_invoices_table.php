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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->enum('do_no',['do_no_1','do_no_2','do_no_3']);
            $table->unsignedBigInteger('cutomer_id');
            $table->foreign('cutomer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->string('invoice_no');
            $table->date('date');
            $table->string('create_by');
            $table->string('term');
            $table->string('ac_no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
