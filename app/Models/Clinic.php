<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    //
    protected $guarded = ['id'];

    public function patients()
    {
        return $this->hasMany(Patients::class);
    }

    public function doctors()
    {
        return $this->hasMany(User::class);
    }

    public function assistants()
    {
        return $this->hasMany(User::class);
    }
}
