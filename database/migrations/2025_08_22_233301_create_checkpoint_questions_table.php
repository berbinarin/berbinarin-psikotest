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
        Schema::create('checkpoint_questions', function (Blueprint $table) {
            $table->id();
            $table->text('text')->nullable();
            $table->enum('type', ['multiple_choice', 'short_answer']);
            $table->json('options')->nullable();
            $table->json('scoring')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkpoint_questions');
    }
};
