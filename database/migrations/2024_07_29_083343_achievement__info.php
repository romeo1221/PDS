<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAwardsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Achievement_Info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stud_id'); 

            $table->string('award_name');
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
        Schema::dropIfExists('Achievement_Info');
    }
}