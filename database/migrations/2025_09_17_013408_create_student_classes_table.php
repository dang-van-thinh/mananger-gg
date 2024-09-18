<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Student;
use App\Models\Classes;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('student_classes', function (Blueprint $table) {
            $table->foreignIdFor(Student::class)->constrained()->onDelete("cascade")->onUpdate('cascade');
            $table->foreignIdFor(Classes::class)->constrained()->onDelete("cascade")->onUpdate('cascade');
            $table->primary(['student_id', 'classes_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_classes');
    }
};
