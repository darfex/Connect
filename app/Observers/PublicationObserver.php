<?php

namespace App\Observers;

use App\Models\Publication;
use Illuminate\Support\Facades\Log;
use App\Notifications\NewPublication;
use Illuminate\Support\Facades\Notification;

class PublicationObserver
{
    /**
     * Handle the Publication "created" event.
     *
     * @param  \App\Models\Publication  $publication
     * @return void
     */
    public function created(Publication $publication)
    {
        $user = $publication->user;
        $followers = $publication->user->followers;

        // Log::info($followers);

        foreach($followers as $follower)
        {
            Notification::send($follower, new NewPublication($user));
        }

    }

    /**
     * Handle the Publication "updated" event.
     *
     * @param  \App\Models\Publication  $publication
     * @return void
     */
    public function updated(Publication $publication)
    {
        //
    }

    /**
     * Handle the Publication "deleted" event.
     *
     * @param  \App\Models\Publication  $publication
     * @return void
     */
    public function deleted(Publication $publication)
    {
        //
    }

    /**
     * Handle the Publication "restored" event.
     *
     * @param  \App\Models\Publication  $publication
     * @return void
     */
    public function restored(Publication $publication)
    {
        //
    }

    /**
     * Handle the Publication "force deleted" event.
     *
     * @param  \App\Models\Publication  $pulbication
     * @return void
     */
    public function forceDeleted(Publication $pulbication)
    {
        //
    }
}
