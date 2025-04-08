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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // 授業名
            $table->foreignId('teacher_id')->constrained('users'); // 教師のアカウントID
            $table->integer('total_lectures'); // 講義日数
            $table->integer('completed_lectures')->default(0); // 受講日数(現在までの授業日数)
            $table->boolean('is_deleted')->default(false); // 削除フラグ
            $table->enum('term', ['前期', '後期', '通年']); // 期フラグ
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
