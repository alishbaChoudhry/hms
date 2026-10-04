<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('checkup_medicine', function (Blueprint $table) {

            $table->id();

            $table->foreignId('checkup_id')
                  ->constrained('checkups')
                  ->cascadeOnDelete();

            $table->foreignId('medicine_id')
                  ->constrained('medicines')
                  ->cascadeOnDelete();

            $table->string('dosage')->nullable();

            $table->string('frequency')->nullable();

            $table->string('duration')->nullable();

            $table->timestamps();

            $table->unique([
                'checkup_id',
                'medicine_id'
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('checkup_medicine');
    }
};