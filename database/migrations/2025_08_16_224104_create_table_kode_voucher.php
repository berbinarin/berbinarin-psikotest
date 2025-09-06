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
        Schema::create('kode_voucher', function (Blueprint $table) {
            $table->id();
            $table->string('category'); 
            $table->string('nama_voucher'); 
            $table->string('code')->unique(); 
            $table->integer('percentage'); 
            $table->string('tipe'); 
            $table->string('detail'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kode_voucher');
    }
};
