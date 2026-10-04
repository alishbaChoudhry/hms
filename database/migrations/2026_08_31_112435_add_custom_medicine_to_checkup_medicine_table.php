<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('checkup_medicine', function (Blueprint $table) {
            $table->string('custom_medicine_name')
                  ->nullable()
                  ->after('medicine_id');

            $table->unsignedBigInteger('medicine_id')
                  ->nullable()
                  ->change();
        });
    }

    public function down(): void
    {
        Schema::table('checkup_medicine', function (Blueprint $table) {
            $table->dropColumn('custom_medicine_name');

            $table->unsignedBigInteger('medicine_id')
                  ->nullable(false)
                  ->change();
        });
    }
};