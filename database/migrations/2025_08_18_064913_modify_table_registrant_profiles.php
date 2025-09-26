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
        Schema::table('registrant_profiles', function (Blueprint $table) {
            $table->string('voucher_category')->nullable();
            $table->string('voucher_code')->nullable();
            $table->integer('discount_percentage')->nullable();
            $table->string('student_card')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('registrant_profiles', function (Blueprint $table) {
            $table->dropColumn('voucher_category');
            $table->dropColumn('voucher_code');
            $table->dropColumn('discount_percentage');
            $table->dropColumn('student_card');
        });
    }
};
