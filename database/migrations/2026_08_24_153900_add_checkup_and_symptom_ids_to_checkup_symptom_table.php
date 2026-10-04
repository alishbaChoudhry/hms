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
        Schema::table('checkup_symptom', function (Blueprint $table) {
            $table->foreignId('checkup_id')
                ->after('id')
                ->constrained('checkups')
                ->cascadeOnDelete();

            $table->foreignId('symptom_id')
                ->after('checkup_id')
                ->constrained('symptoms')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('checkup_symptom', function (Blueprint $table) {
            $table->dropForeign(['checkup_id']);
            $table->dropForeign(['symptom_id']);

            $table->dropColumn(['checkup_id', 'symptom_id']);
        });
    }
};