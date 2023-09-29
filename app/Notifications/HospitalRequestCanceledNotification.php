<?php

namespace App\Notifications;

use App\Models\VacationOrHospital;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class HospitalRequestCanceledNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(VacationOrHospital $hospital)
    {
        $this->hospital = $hospital;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line(__('notifications.hospital_request_canceled_title', ['date' => $this->hospital->getDateStart()]))
            ->line(
                __(
                    'notifications.hospital_request_canceled_text',
                    [
                        'date_start' => $this->hospital->getDateStart(),
                        'date_end' => $this->hospital->getDateEnd(),
                    ]
                )
            )
            ->line(__('notifications.thank_you_for_using_our_application'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
