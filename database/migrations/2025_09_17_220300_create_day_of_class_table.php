<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Classes;
use App\Models\DayOfWeek;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('day_of_class', function (Blueprint $table) {
            $table->foreignIdFor(Classes::class)->constrained();
            $table->foreignIdFor(DayOfWeek::class)->constrained();
            $table->primary(['classes_id','day_of_week_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('day_of_class');
    }
};
