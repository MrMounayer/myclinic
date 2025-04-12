<?php

namespace App\Observers;

use App\Models\Patient;
use Filament\Facades\Filament;


class PatientObserver
{


    /**
     * Handle the Patient "creating" event.
     */
    public function creating(Patient $patient): void
    {
        // Get the authenticated user
        $user = Filament::auth()->user();
        
        // Set the clinic_id if user has a clinic
        if ($user && $user->clinic_id) {
            $patient->clinic_id = $user->clinic_id;
            $patient->doctor_id = $user->id;
        }
    }

    /**
     * Handle the Patient "created" event.
     */
    public function created(Patient $patient): void
    {
        //
    }

    /**
     * Handle the Patient "updated" event.
     */
    public function updated(Patient $patient): void
    {
        //
    }

    /**
     * Handle the Patient "deleted" event.
     */
    public function deleted(Patient $patient): void
    {
        //
    }

    /**
     * Handle the Patient "restored" event.
     */
    public function restored(Patient $patient): void
    {
        //
    }

    /**
     * Handle the Patient "force deleted" event.
     */
    public function forceDeleted(Patient $patient): void
    {
        //
    }
}
