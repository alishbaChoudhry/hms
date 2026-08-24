<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NewPatientNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $patient;

public function __construct($patient)
{
    $this->patient = $patient;
}

    /**
     * Notification delivery channels.
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Store notification in database.
     */
    public function toArray(object $notifiable): array
{
    return [
        'type' => 'patient',
        'message' => 'New patient registered: ' . $this->patient->name,
        'url' => route('patients', ['highlight' => $this->patient->id]),
    ];
}
}