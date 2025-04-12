<?php

namespace App\Observers;

use App\Models\Appointement;

class AppointementObserver
{
    /**
     * Handle the Appointement "created" event.
     */
    public function created(Appointement $appointement): void
    {
        //
    }

    /**
     * Handle the Appointement "updated" event.
     */
    public function updated(Appointement $appointement): void
    {
        //
    }

    /**
     * Handle the Appointement "deleted" event.
     */
    public function deleted(Appointement $appointement): void
    {
        //
    }

    /**
     * Handle the Appointement "restored" event.
     */
    public function restored(Appointement $appointement): void
    {
        //
    }

    /**
     * Handle the Appointement "force deleted" event.
     */
    public function forceDeleted(Appointement $appointement): void
    {
        //
    }
}
