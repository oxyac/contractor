<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContractResource\Pages;
use App\Filament\Resources\ContractResource\RelationManagers;
use App\Models\Contract;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContractResource extends Resource
{
    protected static ?string $model = Contract::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'My space';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Contract Details')
                    ->schema([
                        Forms\Components\Select::make('from')
                            ->label('From')
                            ->relationship('fromEntity', 'name')
                            ->preload()
                            ->searchable(),
                        Forms\Components\Select::make('to')
                            ->label('To')
                            ->relationship('toEntity', 'name')
                            ->preload()
                            ->searchable(),

                        Forms\Components\Select::make('currency')
                            ->label('Currency')
                            ->options([
                                'USD' => 'USD',
                                'EUR' => 'EUR',
                                'GBP' => 'GBP',
                                'JPY' => 'JPY',
                                'CNY' => 'CNY',
                            ])
                            ->default('USD'),

                        Forms\Components\Select::make('language_code')
                            ->label('Language')
                            ->options([
                                'en' => 'English',
                                'es' => 'Spanish',
                                'fr' => 'French',
                                'de' => 'German',
                                'it' => 'Italian',
                            ])
                            ->default('en'),

                        Forms\Components\DatePicker::make('contract_date')
                            ->label('Contract Date')
                            ->default(now()),

                        Forms\Components\DatePicker::make('contract_start_date')
                            ->label('Start Date')
                            ->default(now()),

                        Forms\Components\DatePicker::make('contract_due_date')
                            ->label('Due Date')
                            ->default(now()->addYear()),

                        Forms\Components\TextInput::make('total')
                        ->numeric()
                        ->label('Total'),

                        Forms\Components\Checkbox::make('is_limited')
                            ->label('Is Limited'),

                        Forms\Components\Checkbox::make('is_subscription')
                            ->label('Is Subscription'),

                        Forms\Components\Checkbox::make('is_in_rates')
                            ->label('Is In Rates'),

                        Forms\Components\Textarea::make('notes')
                            ->label('Notes')
                            ->rows(3),
                    ])->columns(),

                Forms\Components\Repeater::make('services')
                    ->label('Services')
                    ->addActionLabel('Add Service')
                    ->columns(3)
                    ->schema([
                        Forms\Components\TextInput::make('description')
                            ->label('Description'),
                        Forms\Components\TextInput::make('quantity')
                            ->label('Quantity')
                            ->numeric(),
                        Forms\Components\TextInput::make('price')
                            ->label('Price')
                            ->numeric(),
                    ])->columnSpanFull(),

                Forms\Components\SpatieMediaLibraryFileUpload::make('attachments')
                    ->multiple()
                    ->disk('s3')->columnSpanFull(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fromEntity.name')
                    ->label('From')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('toEntity.name')
                    ->label('To')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('file')
                    ->state(function (Contract $record) {
                        return $record->media()->first()?->file_name;
                    }),
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
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])->defaultSort('id', 'desc')->modifyQueryUsing(
                function (Builder $query) {
                    $query->where('legal_entity_id', auth()->user()->legal_entity_id);
                }
            );
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
            'index' => Pages\ListContracts::route('/'),
            'create' => Pages\CreateContract::route('/create'),
            'edit' => Pages\EditContract::route('/{record}/edit'),
        ];
    }
}
