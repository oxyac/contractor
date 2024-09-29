<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LegalEntityResource\Pages;
use App\Filament\Resources\LegalEntityResource\RelationManagers;
use App\Models\LegalEntity;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LegalEntityResource extends Resource
{
    protected static ?string $model = LegalEntity::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'My space';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->placeholder('Enter the name of the legal entity'),
                Forms\Components\TextInput::make('entity_type')
                    ->required()
                    ->placeholder('Enter the type of the legal entity'),
                Forms\Components\TextInput::make('iban')
                    ->required()
                    ->placeholder('Enter the IBAN of the legal entity'),
                Forms\Components\TextInput::make('email')
                    ->required()
                    ->placeholder('Enter the email of the legal entity'),
                Forms\Components\TextInput::make('phone')
                    ->required()
                    ->placeholder('Enter the phone of the legal entity'),
                Forms\Components\TextInput::make('address')
                    ->required()
                    ->placeholder('Enter the address of the legal entity'),
                Forms\Components\TextInput::make('bank_details')
                    ->required()
                    ->placeholder('Enter the bank details of the legal entity'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('entity_type')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function infolist(Infolists\Infolist $infolist): Infolists\Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\TextEntry::make('name'),
                Infolists\Components\TextEntry::make('entity_type'),
                Infolists\Components\TextEntry::make('iban')
                ->columnSpanFull(),
                Infolists\Components\TextEntry::make('email'),
                Infolists\Components\TextEntry::make('phone'),
                Infolists\Components\TextEntry::make('address'),
                Infolists\Components\TextEntry::make('bank_details')
                    ->columnSpanFull(),

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
            'index' => Pages\ListLegalEntities::route('/'),
            'create' => Pages\CreateLegalEntity::route('/create'),
            'edit' => Pages\EditLegalEntity::route('/{record}/edit'),
        ];
    }
}
