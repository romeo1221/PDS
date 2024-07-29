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
        
            Schema::create('louise', function (Blueprint $table) {
            $table->id();
            $table->string('stud_idsurname');
            $table->string('fname');
            $table->string('mname');
            $table->string('ext')->nullable();
            $table->string('contact_number');
            $table->string('status')->nullable();
            $table->date('dob');
            $table->string('pob');
            $table->string('citizenship');
            $table->string('sex');
            $table->string('religion');
            $table->decimal('height', 5, 2); // Adjust precision and scale as needed
            $table->decimal('weight', 5, 2); // Adjust precision and scale as needed
            $table->string('blood_type');
            $table->string('contact')->nullable();
            $table->string('email');
            $table->string('gsis')->nullable();
            $table->string('pagibig')->nullable();
            $table->string('philhealth')->nullable();
            $table->string('SSS')->nullable();
            $table->string('tin')->nullable();
            $table->boolean('agency_employee')->default(false);
            $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('louise');
    }
};
