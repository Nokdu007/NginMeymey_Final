<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // (FK) Students: student_id, student_name, gender, dob, enrollment,
        // enrollment_date, description, dept_id, created_at, updated_at
        Schema::create('students', function (Blueprint $table) {
            $table->id('student_id');
            $table->string('student_name');
            $table->string('email')->unique();
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->date('dob')->nullable();
            $table->unsignedTinyInteger('enrollment')->default(0); // years enrolled
            $table->date('enrollment_date');
            $table->text('description')->nullable();
            $table->foreignId('dept_id')
                  ->constrained('departments', 'dept_id')
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
