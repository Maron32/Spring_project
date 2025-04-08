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
        Schema::create('timetables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subject_id')->constrained();; // 科目id
            $table->foreignId('day_id')->constrained();; // 曜日id（例: 1=月, 2=火, ...）
            $table->foreignId('period_id')->constrained();; // コマid（例: 1限, 2限, ...）
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timetables');
    }
};
