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
        Schema::create('registrant_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained('users');
            $table->foreignId('test_type_id')->constrained('test_types');
            $table->enum('gender', ['male', 'female']);
            $table->integer('age', false, true);
            $table->string('domicile');
            $table->string('phone_number');
            $table->enum('psikotes_service', ['offline', 'online']);
            $table->text('reason');
            $table->datetime('schedule');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('psikotes_paid_profiles');
    }
};
