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
        Schema::create('psikotes_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('test_section_id')->constrained('psikotes_sections');
            $table->integer('order', false, true);
            $table->text('text')->nullable();
            $table->string('image_path')->nullable();
            $table->enum('type', ['multiple_choice', 'multiple_select', 'essay', 'likert', 'image_upload', 'ordering']);
            $table->json('option')->nullable();
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
        Schema::dropIfExists('psikotes_questions');
    }
};
