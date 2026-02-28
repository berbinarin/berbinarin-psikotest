<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $this->deduplicateResponses();
        $this->deduplicatePsikotesFreeResponses();
        $this->deduplicateCheckpointResponses();

        Schema::table('responses', function (Blueprint $table) {
            $table->unique(['attempt_id', 'question_id'], 'responses_attempt_question_unique');
        });

        Schema::table('psikotes_free_responses', function (Blueprint $table) {
            $table->unique(['psikotes_free_attempt_id', 'question_id'], 'free_responses_attempt_question_unique');
        });

        Schema::table('checkpoint_responses', function (Blueprint $table) {
            $table->unique(['attempt_id', 'checkpoint_question_id'], 'checkpoint_attempt_question_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('responses', function (Blueprint $table) {
            $table->dropUnique('responses_attempt_question_unique');
        });

        Schema::table('psikotes_free_responses', function (Blueprint $table) {
            $table->dropUnique('free_responses_attempt_question_unique');
        });

        Schema::table('checkpoint_responses', function (Blueprint $table) {
            $table->dropUnique('checkpoint_attempt_question_unique');
        });
    }

    private function deduplicateResponses(): void
    {
        DB::table('responses')
            ->selectRaw('COALESCE(MAX(CASE WHEN deleted_at IS NULL THEN id END), MAX(id)) as keep_id, attempt_id, question_id')
            ->groupBy('attempt_id', 'question_id')
            ->orderBy('keep_id')
            ->chunk(1000, function ($rows) {
                foreach ($rows as $row) {
                    DB::table('responses')
                        ->where('attempt_id', $row->attempt_id)
                        ->where('question_id', $row->question_id)
                        ->where('id', '!=', $row->keep_id)
                        ->delete();
                }
            });
    }

    private function deduplicatePsikotesFreeResponses(): void
    {
        DB::table('psikotes_free_responses')
            ->selectRaw('COALESCE(MAX(CASE WHEN deleted_at IS NULL THEN id END), MAX(id)) as keep_id, psikotes_free_attempt_id, question_id')
            ->groupBy('psikotes_free_attempt_id', 'question_id')
            ->orderBy('keep_id')
            ->chunk(1000, function ($rows) {
                foreach ($rows as $row) {
                    DB::table('psikotes_free_responses')
                        ->where('psikotes_free_attempt_id', $row->psikotes_free_attempt_id)
                        ->where('question_id', $row->question_id)
                        ->where('id', '!=', $row->keep_id)
                        ->delete();
                }
            });
    }

    private function deduplicateCheckpointResponses(): void
    {
        DB::table('checkpoint_responses')
            ->selectRaw('COALESCE(MAX(CASE WHEN deleted_at IS NULL THEN id END), MAX(id)) as keep_id, attempt_id, checkpoint_question_id')
            ->groupBy('attempt_id', 'checkpoint_question_id')
            ->orderBy('keep_id')
            ->chunk(1000, function ($rows) {
                foreach ($rows as $row) {
                    DB::table('checkpoint_responses')
                        ->where('attempt_id', $row->attempt_id)
                        ->where('checkpoint_question_id', $row->checkpoint_question_id)
                        ->where('id', '!=', $row->keep_id)
                        ->delete();
                }
            });
    }
};
