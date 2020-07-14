<?php

declare(strict_types=1);

namespace App\Listeners;

use Illuminate\Support\Facades\Mail;

final class SendNotification
{
    public function handle( $event): void
    {
        $emails = explode(',', env('MANAGER_EMAILS'));
        $emails[] = $event->user->email;
        foreach ($emails as $email) {
            Mail::to($email)->send(new \App\Mail\OrderCreated($event->order, $event->price));
        }
    }
}
