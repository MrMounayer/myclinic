<?php

namespace App\Filament\App\Resources\TreatementResource\Pages;

use App\Filament\App\Resources\TreatementResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTreatement extends EditRecord
{
    protected static string $resource = TreatementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
