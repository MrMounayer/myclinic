<?php

namespace App\Observers;

use App\Models\Appointement;

class AppointementObserver
{
    public function creating(Appointement $appointement) : void
    {
         // Get the authenticated user
         $user = auth()->user();
        
         // Set the clinic_id if user has a clinic
         if ($user && $user->clinic_id) {
            //  $appointement->clinic_id = $user->clinic_id;
            //  $appointement->doctor_id = $user->id;
         }
    }
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
