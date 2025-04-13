<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

use App\Observers\PatientObserver;

#[ObservedBy([PatientObserver::class])]
class Patient extends Model
{
    //
    protected $guarded = ['id'];
    
    public function clinic(): BelongsTo
    {
        return $this->belongsTo(Clinic::class);
    }
    

}
