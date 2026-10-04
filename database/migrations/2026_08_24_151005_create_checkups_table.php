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
        Schema::create('checkups', function (Blueprint $table) {

            $table->id();

            // Patient
            $table->foreignId('patient_id')
                  ->constrained('patients')
                  ->cascadeOnDelete();

            // Doctor
            $table->foreignId('doctor_id')
                  ->constrained('doctors')
                  ->cascadeOnDelete();

            // Follow-up Date
            $table->date('follow_up_date')->nullable();

            // Diagnosis
            $table->text('diagnosis')->nullable();

            // Doctor's Notes
            $table->text('doctor_notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkups');
    }
};