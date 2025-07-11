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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('section_id')->constrained('sections');
            $table->integer('order', false, true);
            $table->text('text')->nullable();
            $table->string('image_path')->nullable();
            $table->enum('type', ['binary_choice', 'multiple_choice', 'multiple_select', 'essay', 'likert', 'image_upload', 'ordering', 'instruction', 'short_answer']);
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
        Schema::dropIfExists('questions');
    }
};
