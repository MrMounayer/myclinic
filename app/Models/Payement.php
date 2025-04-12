<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use App\Observers\PayementObserver;


#ObservedBy([PayementObserver::class])
class Payement extends Model
{
    //
    protected $guarded = ['id'];
    protected $casts = [
        'date' => 'date',
        'amount' => 'decimal:2',
    ];
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }

}
