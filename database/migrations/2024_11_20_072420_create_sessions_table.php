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
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();
            $table->date('day');
            $table->time('start_time'); // Thay đổi thành time vì đã có 'day'
            $table->time('end_time');   // Thay đổi thành time vì đã có 'day'
            $table->unsignedInteger('max_students'); // Chuyển thành unsigned integer cho giá trị dương
            $table->enum('status', ['pending', 'confirmed', 'completed', 'cancelled'])->default('pending'); // Sửa lỗi chính tả và thêm enum
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};
