<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use App\Observers\ExpenseObserver;

#[ObservedBy([ExpenseObserver::class])]
class Expense extends Model
{
    //
    protected $guarded = ['id'];

    protected static function booted()
    {
        static::addGlobalScope('doctorsClinic', function ($query) {
            if (auth()->check() && auth()->user()->clinic_id) {
                $query->where('clinic_id', auth()->user()->clinic_id);
            }
        });
    }
    protected $casts = [
        'date' => 'date',
    ];
    
    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }

}
