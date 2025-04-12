<?php

namespace App\Filament\App\Resources\PatientResource\Pages;

use App\Filament\App\Resources\PatientResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePatient extends CreateRecord
{
    protected static string $resource = PatientResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {   
        // $data['doctor_id'] = auth()->user()->id;
        // $data['clinic_id'] = auth()->user()->clinic_id;
        // dd($data);
        return $data;
    }
}
