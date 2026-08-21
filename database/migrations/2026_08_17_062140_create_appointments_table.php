<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {

            $table->id();

            // Patient & Doctor
            $table->foreignId('patient_id')
                ->constrained('patients')
                ->onDelete('cascade');

            $table->foreignId('doctor_id')
                ->constrained('doctors')
                ->onDelete('cascade');

            // Appointment Details
            $table->date('appointment_date');

            $table->time('appointment_time');

            $table->enum('appointment_type', [
                'Consultation',
                'Follow-up'
            ]);

            $table->text('reason')->nullable();

            $table->enum('status', [
                'Pending',
                'Confirmed',
                'Completed',
                'Cancelled'
            ])->default('Pending');

            $table->text('notes')->nullable();

            $table->timestamps();

            // Same doctor cannot have two appointments
            // at the same date and time.
            $table->unique([
                'doctor_id',
                'appointment_date',
                'appointment_time'
            ]);

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};