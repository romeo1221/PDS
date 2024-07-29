<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpouseTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Spouse_Info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stud_id'); 

            $table->unsignedBigInteger('spouse_id')->nullable();
            $table->string('surname');
            $table->string('fname');
            $table->string('mname');
            $table->string('occupation');
            $table->string('employer/business_name');
            $table->string('business_add');
            $table->string('contact');
            $table->string('name_children');
            $table->date('child_bday');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('stud_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('spouse_id')->references('id')->on('spouses')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Spouse_Info');
    }
}