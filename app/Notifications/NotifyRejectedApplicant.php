<?php

namespace App\Notifications;

use App\Models\HumanResource\Applicant;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifyRejectedApplicant extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    private Applicant $applicant;
    public function __construct(Applicant $applicant)
    {
        $this->applicant = $applicant;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Application Update: '.$this->applicant->position->name.' at RapidMart')
                    ->line('\n')
                    ->greeting('Dear '.$this->applicant->first_name)
                    ->line('\n')
                    ->line('We appreciate the time and effort you invested in applying for the '.$this->applicant->position->name.' position at ')
                    ->line('RapidMart. After careful consideration of all applicants, we regret to inform you that your ')
                    ->line('application has not been successful at this time.')
                    ->line('Please know that our decision was not easy, as we received numerous applications from highly')
                    ->line('qualified candidates. While your qualifications and experience are impressive, we have selected ')
                    ->line('another candidate whose skills and background closely align with the requirements of the role.')
                    ->line('\n')
                    ->line('We genuinely appreciate your interest in joining our team and want to thank you for considering ')
                    ->line('employment opportunities with RapidMart. We encourage you to keep an eye on our ')
                    ->line('careers page for future openings that match your skills and experience.')
                    ->line('\n')
                    ->line('Thank you once again for your application and for your interest in [Company Name]. We wish you ')
                    ->line('all the best in your job search and future endeavors.')
                    ->line('\n')
                    ->line('Sincerely')
                    ->line('\n')
                    ->line('Julius Manganti')
                    ->line('Hiring Manager/HR Representative')
                    ->line('RapidMart');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}