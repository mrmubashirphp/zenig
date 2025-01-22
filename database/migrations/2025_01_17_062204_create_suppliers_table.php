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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('name'); // Supplier Name
            $table->text('address')->nullable(); // Supplier Address
            $table->string('contact_no')->nullable(); // Supplier Contact No
            $table->enum('group', ['Direct', 'Indirect'])->default('Indirect'); // Group (Direct/Indirect)

            // Contact Person Details
            $table->string('contact_person_name')->nullable(); // Contact Person Name
            $table->string('telephone')->nullable(); // Contact Person Telephone
            $table->string('fax')->nullable(); // Contact Person Fax
            $table->string('email')->nullable(); // Contact Person Email
            $table->string('department')->nullable(); // Contact Person Department
            $table->string('mobile_phone')->nullable(); // Contact Person Mobile Phone

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
