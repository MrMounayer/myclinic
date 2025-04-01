<?php

namespace App\Filament\App\Resources\AppointementResource\Pages;

use App\Filament\App\Resources\AppointementResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAppointements extends ListRecords
{
    protected static string $resource = AppointementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
