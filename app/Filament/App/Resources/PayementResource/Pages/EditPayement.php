<?php

namespace App\Filament\App\Resources\PayementResource\Pages;

use App\Filament\App\Resources\PayementResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPayement extends EditRecord
{
    protected static string $resource = PayementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
