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
        Schema::create('psikotes_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('psikotes_tool_id')->constrained('psikotes_tools');
            $table->string('title');
            $table->text('description')->nullable();
            $table->integer('order', false, true);
            $table->integer('duration', false, true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('psikotes_sections');
    }
};
