<?php

use App\Models\User;
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
        Schema::create('instructors', function (Blueprint $table) {
            $table->id();
            $table->integer('license_number'); // số bằng lái
            $table->string('specialzation',50); // chuyên môn
            $table->integer('experience_years')->default(0);
            $table->time('available_from'); // giờ bắt đầu
            $table->time('available_to'); // giờ kết thúc sẵn sàng dạy
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructors');
    }
};
