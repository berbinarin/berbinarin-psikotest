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
        Schema::create('psikotes_free_attempts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('psikotes_free_profile_id')->constrained('psikotes_free_profiles');
            $table->foreignId('tool_id')->constrained('tools');
            $table->enum('status', ['completed', 'in_progress']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('psikotes_free_attempts');
    }
};
