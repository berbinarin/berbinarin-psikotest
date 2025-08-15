<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Ubah FK responses -> attempts jadi cascade
        Schema::table('responses', function (Blueprint $table) {
            $table->dropForeign(['attempt_id']);
            $table->foreign('attempt_id')
                    ->references('id')
                    ->on('attempts')
                    ->onDelete('cascade');
        });

        // Ubah FK attempts -> users jadi cascade
        Schema::table('attempts', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
        });

        // Ubah FK registrant_profiles -> users jadi cascade
        Schema::table('registrant_profiles', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        // Balikin ke restrict kalau rollback
        Schema::table('responses', function (Blueprint $table) {
            $table->dropForeign(['attempt_id']);
            $table->foreign('attempt_id')
                    ->references('id')
                    ->on('attempts')
                    ->onDelete('restrict');
        });

        Schema::table('attempts', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('restrict');
        });

        Schema::table('registrant_profiles', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('restrict');
        });
    }
};
