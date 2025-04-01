<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\PayementResource\Pages;
use App\Filament\App\Resources\PayementResource\RelationManagers;
use App\Models\Payement;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PayementResource extends Resource
{
    protected static ?string $model = Payement::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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
                Forms\Components\DatePicker::make('date')
                    ->required(),
                    Forms\Components\TextInput::make('amount')
                    ->label("Montant")
                    ->required(),
                    Forms\Components\Select::make('method')
                    ->default(1)
                    ->options([
                        "Cheque",
                        "Liquide",
                        ])
                        ->required(),
                    Forms\Components\TextInput::make('note')->label("Remarque"),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('patient_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('clinic_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('amount')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('method')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
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
            'index' => Pages\ListPayements::route('/'),
            'create' => Pages\CreatePayement::route('/create'),
            'edit' => Pages\EditPayement::route('/{record}/edit'),
        ];
    }
}
