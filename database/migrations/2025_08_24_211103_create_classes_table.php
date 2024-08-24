<?php

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Course;
use App\Models\Session;
use App\Models\DayOfWeek;
use App\Models\Room;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->foreignIdFor(Course::class)->constrained()->onDelete("cascade")->onUpdate('cascade');
            $table->foreignIdFor(Student::class)->constrained()->onDelete("cascade")->onUpdate('cascade');
            $table->foreignIdFor(Teacher::class)->constrained()->onDelete("cascade")->onUpdate('cascade');
            $table->foreignIdFor(Session::class)->constrained()->onDelete("cascade")->onUpdate('cascade');
            $table->foreignIdFor(Room::class)->constrained()->onDelete("cascade")->onUpdate('cascade');
            $table->foreignIdFor(DayOfWeek::class)->constrained();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
