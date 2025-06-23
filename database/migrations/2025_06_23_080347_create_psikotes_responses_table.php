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
        Schema::create('psikotes_responses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('psikotes_session_id')->constrained('psikotes_sessions');
            $table->foreignId('psikotes_question_id')->constrained('psikotes_questions');
            $table->json('answer');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('psikotes_responses');
    }
};
