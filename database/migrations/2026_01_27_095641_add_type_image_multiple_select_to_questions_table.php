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
        Schema::table('questions', function (Blueprint $table) {
            $table->enum('type', ['binary_choice', 'multiple_choice', 'image_multiple_choice', 'multiple_select', 'image_multiple_select', 'essay', 'likert', 'image_upload', 'ordering', 'instruction', 'short_answer', 'form'])
                    ->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->enum('type', ['binary_choice', 'multiple_choice', 'multiple_select', 'essay', 'likert', 'image_upload', 'ordering', 'instruction', 'short_answer', 'form'])
                    ->change();
        });
    }
};
