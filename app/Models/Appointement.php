<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
 
use App\Observers\AppointementObserver;

#[ObservedBy([AppointementObserver::class])]
class Appointement extends Model
{
    //
    protected $guarded = ['id'];

    public function patient(){
        return $this->belongsTo(Patient::class);
    }
}
