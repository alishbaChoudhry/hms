<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('checkup_symptom', function (Blueprint $table) {

            $table->unique([
                'checkup_id',
                'symptom_id'
            ]);

        });
    }

    public function down(): void
    {
        Schema::table('checkup_symptom', function (Blueprint $table) {

            $table->dropUnique(
                'checkup_symptom_checkup_id_symptom_id_unique'
            );

        });
    }
};