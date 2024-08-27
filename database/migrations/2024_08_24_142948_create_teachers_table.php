<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \Illuminate\Support\Facades\Date;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name',100)->nullable();
            $table->string('image',255)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('phone', 14)->nullable();
            $table->string('degree', 255)->nullable();
            $table->string('address', 255)->nullable();
            $table->date('birth_day')->nullable();
            $table->string('qualification')->nullable();
            $table->decimal('hourly_rate', 8,2)->nullable();
            $table->date('enrollment_date')->default(Date::now());
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
