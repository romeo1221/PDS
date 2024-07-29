<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Address_Info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stud_id'); // Assuming stud_id is a foreign key referencing the student table
            $table->string('country');
            $table->string('barangay');
            $table->string('prov'); // Assuming 'prov' stands for 'province'
            $table->string('street');
            $table->string('type'); // Assuming 'type' represents address type (e.g., residential, commercial)
            $table->string('zip');
            $table->timestamps();

            // Foreign key constraint for stud_id
            $table->foreign('stud_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Address_Info');
    }
};
