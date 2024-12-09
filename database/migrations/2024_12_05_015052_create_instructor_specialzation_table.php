<?php

use App\Models\Instructor;
use App\Models\Specialzation;
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
        Schema::create('instructor_specialzation', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Specialzation::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Instructor::class)->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('instructor_specialzation', function (Blueprint $table) {
            $table->dropForeignIdFor(Instructor::class);
            $table->dropForeignIdFor(Specialzation::class);
        });

        Schema::dropIfExists('instructor_specialzation');
    }
};
