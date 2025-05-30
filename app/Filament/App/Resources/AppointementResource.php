<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\AppointementResource\Pages;
use App\Filament\App\Resources\AppointementResource\RelationManagers;
use App\Models\Appointement;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AppointementResource extends Resource
{
    protected static ?string $model = Appointement::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $label = "Rendez-Vous";
    protected static ?string $pluralLabel = "Rendez-Vous";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('patient_id')
                ->options(
                    \App\Models\Patient::all()->pluck('full_name', 'id')
                    )->searchable()
                    ->label('Patient')
                    ->required(),
                    Forms\Components\DateTimePicker::make('date')
                        ->default(today())
                        ->required(),
                    Forms\Components\Select::make('status')
                        ->boolean()
                        ->default(1)
                        ->options([
                            "Annulé",
                            "Confrimé",
                        ])
                        ->required(),
                    Forms\Components\TextInput::make('cancel_reason')
                    ->label("Cause"),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('date')
                    ->dateTime()
                    ->sortable(),
                    Tables\Columns\TextColumn::make('patient.full_name')
                    ->searchable()
                    ->sortable(),
                    Tables\Columns\IconColumn::make('status')
                    ->boolean(),
                    Tables\Columns\TextColumn::make('cancel_reason')
                    ->label("Cause d'Annulation")
                    ->searchable(),
                    Tables\Columns\TextColumn::make('created_at')
                        ->dateTime()
                        ->sortable()
                        ->toggleable(isToggledHiddenByDefault: true),
                    Tables\Columns\TextColumn::make('updated_at')
                        ->dateTime()
                        ->sortable()
                        ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAppointements::route('/'),
            'create' => Pages\CreateAppointement::route('/create'),
            'edit' => Pages\EditAppointement::route('/{record}/edit'),
        ];
    }
}
