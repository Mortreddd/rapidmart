<?php

namespace App\Providers;

use App\Events\AppointmentCreationEvent;
use App\Events\ProcessRejectedApplicantEvent;
use App\Listeners\AppointmentNoticeListener;
use App\Listeners\RejectedApplicantListener;
use App\Models\HumanResource\Applicant;
use App\Observers\Applicant\ApplicantObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        ProcessRejectedApplicantEvent::class => [
            RejectedApplicantListener::class
        ],
        AppointmentCreationEvent::class => [
            AppointmentNoticeListener::class
        ]
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        Applicant::observe(ApplicantObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}