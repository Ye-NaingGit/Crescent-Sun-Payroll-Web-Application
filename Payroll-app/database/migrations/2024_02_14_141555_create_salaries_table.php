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
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->string('employeeName');
            $table->string('adminName');
            $table->unsignedBigInteger('employeeID')->nullable(true);
            $table->foreign('employeeID')->references('id')->on('users')->nullOnDelete();
            $table->unsignedBigInteger('adminID')->nullable(true);
            $table->foreign('adminID')->references('id')->on('users')->nullOnDelete();
            $table->double('baseSalary');
            $table->double('attendence');
            $table->double('attendence_bonus');
            $table->double('bonus');
            $table->string('bonus_Information')->nullable(true);
            $table->double('fine');
            $table->string('fine_Information')->nullable(true);
            $table->double('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salaries');
    }
};
