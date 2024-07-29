<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Educational_Info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stud_id');
            $table->string('level');
            $table->string('school_name');
            $table->string('period_attended');
            $table->string('highest_level');
            $table->string('year_graduated');
            $table->string('cs_ra1080_ces_csee_beligibility_dlicense');
            $table->string('rating');
            $table->string('conferment');
            $table->string('place');
            $table->string('license');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('stud_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Educational_Info');
    }
};
