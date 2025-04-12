<?php

namespace App\Observers;

use App\Models\{Payement};

class PayementObserver
{
    /**
     * Handle the Payement "creating" event.
     */
    public function creating(Payement $payement): void
    {
        // dd("hello from observer");

        $user = auth()->user();

        if($user && $user->clinic_id) {
            $payement->clinic_id = $user->clinic_id;
        }
    }
    /**
     * Handle the Payement "created" event.
     */
    public function created(Payement $payement): void
    {
        //
    }

    /**
     * Handle the Payement "updated" event.
     */
    public function updated(Payement $payement): void
    {
        //
    }

    /**
     * Handle the Payement "deleted" event.
     */
    public function deleted(Payement $payement): void
    {
        //
    }

    /**
     * Handle the Payement "restored" event.
     */
    public function restored(Payement $payement): void
    {
        //
    }

    /**
     * Handle the Payement "force deleted" event.
     */
    public function forceDeleted(Payement $payement): void
    {
        //
    }
}
