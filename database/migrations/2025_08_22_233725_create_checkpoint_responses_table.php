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
        Schema::create('checkpoint_responses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('attempt_id')->constrained('attempts');
            $table->foreignId('checkpoint_question_id')->constrained('checkpoint_questions');
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
        Schema::dropIfExists('checkpoint_responses');
    }
};
