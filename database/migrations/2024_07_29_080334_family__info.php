<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamilyTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Family_Info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stud_id');

            $table->string('fathers_name');
            $table->string('occupation1');
            $table->string('address1');
            $table->string('mothers_name');
            $table->string('occupation2');
            $table->string('address2');
            $table->unsignedBigInteger('spouse_id')->nullable(); // Assuming spouse_id is nullable
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('stud_id')->references('id')->on('students')->onDelete('cascade'); // Assuming stud_id references the 'students' table
            $table->foreign('spouse_id')->references('id')->on('spouses')->onDelete('set null'); // Assuming spouse_id references the 'spouses' table
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Family_Info');
    }
};
