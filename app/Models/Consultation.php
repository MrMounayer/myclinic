<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Attributes\ObservedBy;
 
use App\Observers\ConsultationObserver;

#[ObservedBy([ConsultationObserver::class])]
class Consultation extends Model
{
    //
    protected $guarded = ['id'];

    // protected static function booted()
    // {
    //     static::addGlobalScope('doctorsClinic', function ($query) {
    //         if (auth()->check() && auth()->user()->clinic_id) {
    //             $query->where('clinic_id', auth()->user()->clinic_id);
    //         }
    //     });
    // }
    protected $casts = [
        'treatement' => 'array',
        'date' => 'date',
    ];
    
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }
    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }
}
