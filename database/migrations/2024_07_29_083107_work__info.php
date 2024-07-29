<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Work_Info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stud_id'); 

            $table->date('inclusive_date');
            $table->string('position');
            $table->string('company');
            $table->decimal('monthly_salary', 10, 2); // Adjust precision and scale as needed
            $table->string('pay_grade');
            $table->string('status');
            $table->boolean('govt_service');
            $table->unsignedBigInteger('training_id')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('stud_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('training_id')->references('id')->on('trainings')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Work_Info');
    }
}